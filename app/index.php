<?php

require "header.php";
require __DIR__."/../vendor/autoload.php";

use Source\Models\Sales;
use Source\Models\Costumers;

$sales = new Sales();
$sales_list = $sales->find()->order("id DESC")->fetch(true);

 ?>
	<h1>Vendas</h1>
	<a href="sales/sales.php">Adicionar venda</a> |
	<a href="costumers/costumers.php">Cadastro de cliente</a> |
	<a href="products/products.php">Cadastro de produto</a>
	<hr>
	<?php if($sales_list != NULL): ?>
		<table cellpadding="10" cellspacing="0" border="1">
			<tr>
				<th>ID</th>
				<th>Cliente</th>
				<th>Data</th>
				<th>Forma de Pagamento</th>
				<th>Total</th>
				<th colspan="2">Ações</th>
			</tr>
			<?php foreach($sales_list as $sale): ?>
		 		<tr>
		 			<td><?=$sale->id?></td>
		 			<td><?=$sale->getCostumer()->name?></td>
		 			<td><?=date("d/m/Y H:i:s", strtotime($sale->created_at))?></td>
		 			<td><?=$sale->getPaymentMethod()->description?></td>
		 			<td>R$ <?=number_format($sale->total, 2, '.', '')?></td>
		 			<td colspan="2">
		 				[<a href="sales/sales-items.php?id=<?=$sale->id?>">Editar</a>]
		 				[<a href="sales/sales-delete.php?id=<?=$sale->id?>">Excluir</a>]
		 			</td>
		 		</tr>
			<?php endforeach ?>
		</table>
	<?php else: ?>
		<h2>Nenhuma venda registrada.</h2>
	<?php endif ?>

<?php require "footer.php"; ?>
