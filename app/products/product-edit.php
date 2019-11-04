<?php

require "../header.php";
require __DIR__."/../../vendor/autoload.php";

use Source\Models\Products;

if (empty($_GET['id']) && !is_numeric($_GET['id'])) {
    header("Location: products.php");
    exit;
}

$id = addslashes($_GET['id']);
$product = (new Products())->findById($id);

 ?>

<h1>Editar produto</h1>
<hr>
<form method="POST" action="product-edit-proc.php">
    <input type="hidden" name="id_product" value="<?=$product->id?>">
    <label>Descrição: </label>
    <input type="text" name="description" value="<?=$product->description?>">
    <br><br>
    <label>Valor: </label>
    <input type="text" name="value" value="<?=number_format($product->unit_value, 2, '.', '') ?? number_format(0.00, 2, '.', '')?>">
    <br><br>
    <input type="submit" value="Alterar">
    <button type="button" onclick="window.location = 'products.php'">Voltar</button>
</form>


<?php require "../footer.php"; ?>
