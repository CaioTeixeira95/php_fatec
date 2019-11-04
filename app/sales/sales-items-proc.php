<?php

require __DIR__."/../../vendor/autoload.php";
use Source\Models\Sales;
use Source\Models\SalesItems;

if(!empty($_POST['id_sale']) &&
   !empty($_POST['item']) &&
   !empty($_POST['quantity']) &&
   !empty($_POST['price'])
) {

    $id_sale = addslashes($_POST['id_sale']);
    $item = addslashes($_POST['item']);
    $quantity = floatval($_POST['quantity']);
    $price = floatval($_POST['price']);

    $sale = (new Sales())->findById($id_sale);
    $sales_items = new SalesItems();

    $sales_items->id_sale = $id_sale;
    $sales_items->id_product = $item;
    $sales_items->quantity = $quantity;
    $sales_items->price = $price;

    if ($sale->fail() == true) {
        echo $sale->fail()->getMessage();
        header("Location: ../index.php");
        exit;
    }

    $sale->total += $quantity * $price;

    $sales_items->save();
    $sale->save();

    header("Location: sales-items.php?id=".$id_sale);
    exit;

}

header("Location: ../index.php");
