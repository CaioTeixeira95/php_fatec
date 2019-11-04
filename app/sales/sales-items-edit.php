<?php

require "../header.php";
require __DIR__."/../../vendor/autoload.php";

use Source\Models\Sales;
use Source\Models\SalesItems;

if (empty($_GET['id']) && !is_numeric($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$sale_items = (new SalesItems())->findById($id);
$sale = (new Sales())->findById($sale_items->id_sale);

 ?>
<h1>Venda <?=$sale->id?></h1>
<h2>Cliente <?=$sale->getCostumer()->name?></h2>
<hr>
<h3>Edição de item</h3>
<form method="POST" action="sales-items-edit-proc.php">

    <input type="hidden" name="id_sale" value="<?=$sale->id?>">
    <input type="hidden" name="id_sales_item" value="<?=$sale_items->id?>">
    <input type="hidden" name="old_quantity" value="<?=$sale_items->quantity?>">
    <input type="hidden" name="old_price" value="<?=$sale_items->price?>">


    <label>Descrição:</label>
    <input readonly type="text" name="description" value="<?=$sale_items->getDescription()->description?>">
    <br><br>
    <label>Quantidade:</label>
    <input type="text" name="new_quantity" value="<?=$sale_items->quantity?>">
    <br><br>
    <label>Valor:</label>
    <input type="text" name="new_price" value="<?=number_format($sale_items->price, 2, '.', '')?>">
    <br><br>
    <input type="submit" value="Alterar">
    <button type="button" onclick="window.location = 'sales-items.php?id=<?=$sale->id?>'">Voltar</button>
</form>

 <?php require "../footer.php"; ?>
