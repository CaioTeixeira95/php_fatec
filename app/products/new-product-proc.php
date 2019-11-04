<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Products;

if (!empty($_POST['description']) && !empty($_POST['value']) && is_numeric($_POST['value'])) {

    $description = addslashes($_POST['description']);
    $value = addslashes($_POST['value']);
    $product = new Products();
    $product->description = $description;
    $product->unit_value = $value;

    $product->save();

}

header("Location: products.php");
