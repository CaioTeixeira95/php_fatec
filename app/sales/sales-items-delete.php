<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Sales;
use Source\Models\SalesItems;

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {

    $id_sales_item = addslashes($_GET['id']);
    $sales_items = (new SalesItems())->findById($id_sales_item);

    if ($sales_items->fail() == true) {
        echo $sales_items->fail()->getMessage();
        header("Location: ../index.php");
        exit;
    }
    else {
        $id_sale = $sales_items->id_sale;
        $sale = (new Sales())->findById($id_sale);
        $sale->total -= $sales_items->quantity * $sales_items->price;
        $sales_items->destroy();
        $sale->save();
        header("Location: sales-items.php?id=".$id_sale);
        exit;
    }

}

header("Location: ../index.php");
