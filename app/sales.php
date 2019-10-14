<?php 

require "header.php";
require __DIR__."/../vendor/autoload.php";

use Source\Models\Costumers;
use Source\Models\Sales;
use Source\Models\PaymentMethod;

$costumers_list = (new Costumers())->find()->fetch(true);
$payment_method_list = (new PaymentMethod())->find()->fetch(true);

?>
<h1>Nova Venda</h1>
<hr>
<form method="POST">
	<label>Cliente:</label>
	<select name="costumer">
		<option value="">-- SELECIONE --</option>
		<?php foreach($costumers_list as $costumer): ?>
			<option value="<?=$costumer->id?>"><?=$costumer->name?></option>
		<?php endforeach ?>
	</select>
	<br><br>
	<label>Forma de pagamento:</label>
	<select name="payment_method">
		<option value="">-- SELECIONE --</option>
		<?php foreach($payment_method_list as $payment_method): ?>
			<option value="<?=$payment_method->id?>"><?=$payment_method->description?></option>
		<?php endforeach ?>
	</select>
	<br><br>
	<input type="submit" value="Salvar">
	<button type="button" onclick="window.location = 'index.php';">Voltar</a>
</form>

<?php

if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['costumer']) && !empty($_POST['payment_method'])) {

	$id_costumer = addslashes($_POST['costumer']);
	$id_payment_method = addslashes($_POST['payment_method']);

	$sale = new Sales();

	$sale->id_costumer = $id_costumer;
	$sale->id_payment_method = $id_payment_method;
	$sale->total = 0.0;

	$sale->save();

	header("Location: sales-items.php?id=".$sale->id);

}

?>

<?php require "footer.php" ?>