<?php

require "../header.php";
require __DIR__."/../../vendor/autoload.php";

use Source\Models\Sales;
use Source\Models\SalesItems;
use Source\Models\Products;

if(empty($_GET['id']) && !is_numeric($_GET['id'])) {
	header("Location: index.php");
}
else {
	$id_sale = addslashes($_GET['id']);
}

$sale = (new Sales())->findById($id_sale);
$items = $sale->getItems();

$products = (new Products())->find()->order("description")->fetch(true);

$i = 0;

?>
<h1>Venda <?=$sale->id?></h1>
<h2>Cliente <?=$sale->getCostumer()->name?></h2>
<hr>
<div class="container-div">

	<div class="inner-div">
		<div>
			<fieldset>
				<legend>Adicione um novo item</legend>
				<form method="POST" action="sales-items-proc.php">
					<input type="hidden" name="id_sale" value="<?=$sale->id?>">
					<label>Descrição: </label>
					<select name="item">
						<option value="">-- SELECIONE --</option>
						<?php foreach($products as $prod): ?>
							<option value="<?=$prod->id?>"><?=$prod->description?></option>
						<?php endforeach ?>
					</select>
					<br><br>
					<label>Valor: </label>
					<input type="text" name="price">
					<br><br>
					<label>Quantidade: </label>
					<input type="text" name="quantity">
					<br><br>
					<input type="submit" value="Incluir Item">
				</form>
			</fieldset>
			<br><br>
			<button type="button" onclick="window.location = '../index.php'">Voltar ao inicio</button>
		</div>
	</div>

	<div class="inner-div">
		<div style="">
			<?php if($items != NULL): ?>
				<table cellpadding="10" cellspacing="0" border="1">
					<tr>
						<th>Nº item</th>
						<th>Descrição</th>
						<th>Quantidade</th>
						<th>Valor</th>
						<th colspan="2">Ações</th>
					</tr>
					<?php foreach($items as $item): ?>
						<tr>
							<td><?=++$i?></td>
							<td><?=$item->getDescription()->description?></td>
							<td><?=$item->quantity?></td>
							<td><?=number_format($item->price, 2, '.', '')?></td>
							<td colspan="2">
								[<a href="sales-items-edit.php?id=<?=$item->id?>">Editar</a>]
								[<a href="sales-items-delete.php?id=<?=$item->id?>">Excluir</a>]
							</td>
						</tr>
					<?php endforeach ?>
					<tr>
						<td colspan="4"><b>Total</b></td>
						<td colspan="2">R$ <?=number_format($sale->total, 2, '.', '')?></td>
					</tr>
				</table>
			<?php else: ?>
				<h3>Nenhum item na venda.</h3>
			<?php endif ?>
		</div>
	</div>

</div>
<br><br>

<?php require "../footer.php" ?>
