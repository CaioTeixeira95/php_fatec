<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Products;

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {

    $id = addslashes($_GET['id']);
    $product = (new Products())->findById($id);

    $product->destroy();

}

header("Location: products.php");
