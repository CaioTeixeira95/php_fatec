<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Sales;
use Source\Models\SalesItems;

if(!empty($_POST['id_sale']) &&
   !empty($_POST['id_sales_item']) &&
   !empty($_POST['new_quantity']) &&
   !empty($_POST['new_price'])
) {

    $id_sale = addslashes($_POST['id_sale']);

    $id_sales_item = addslashes($_POST['id_sales_item']);
    $new_quantity = floatval($_POST['new_quantity']);
    $new_price = floatval($_POST['new_price']);

    $old_quantity = floatval($_POST['old_quantity']);
    $old_price = floatval($_POST['old_price']);

    $sale = (new Sales())->findById($id_sale);
    $sales_items = (new SalesItems())->findById($id_sales_item);

    if ($sale->fail() || $sales_items->fail()) {
        echo $sale->fail() ? $sale->fail()->getMessage() : $sales_items->fail()->getMessage();
        header("Location: ../index.php");
        exit;
    }

    $sales_items->quantity = $new_quantity;
    $sales_items->price = $new_price;

    $sales_items->save();

    $sale->total -= $old_quantity * $old_price;
    $sale->total += $new_quantity * $new_price;

    $sale->save();

    header("Location: sales-items.php?id=".$id_sale);
    exit;

}

header("Location: ../index.php");
