<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Products;

if (!empty($_POST['id_product']) &&
    is_numeric($_POST['id_product']) &&
    !empty($_POST['description']) &&
    !empty($_POST['value']) &&
    is_numeric($_POST['value'])
) {

    $id = addslashes($_POST['id_product']);
    $description = addslashes($_POST['description']);
    $value = addslashes($_POST['value']);

    $product = (new Products())->findById($id);

    if ($product->fail()) {
        echo $product->fail()->getMessage();
        header("Location: products.php");
        exit;
    }

    $product->description = $description;
    $product->unit_value = $value;
    $product->save();

}

header("Location: products.php");
