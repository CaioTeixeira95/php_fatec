<?php 

require __DIR__."/../vendor/autoload.php";

use Source\Models\Sales;
use Source\Models\Costumers;

$sales = new Sales();
$sales_list = $sales->find()->fetch(true);

 ?>
<body>
	<h1>Vendas</h1>
	<a href="sales.php">Adicionar venda</a>
	<hr>
	<table cellpadding="10" cellspacing="0" border="1">
		<tr>
			<th>ID</th>
			<th>Cliente</th>
			<th>Data</th>
			<th>Forma de Pagamento</th>
			<th>Valor</th>
			<th colspan="2">Ações</th>
		</tr>

		<?php if($sales_list != NULL): ?>
			<?php foreach($sales_list as $sale): ?>
		 		<tr>
		 			<td><?=$sale->id?></td>
		 			<td><?=$sale->getCostumer()->name?></td>
		 			<td><?=date("d/m/Y H:i:s", strtotime($sale->created_at))?></td>
		 			<td><?=$sale->getPaymentMethod()->description?></td>
		 			<td><?=number_format($sale->total, 2, '.', '')?></td>
		 			<td colspan="2">
		 				[<a href="sales-items.php?id=<?=$sale->id?>">Editar</a>]
		 				[<a href="sales-delete.php?id=<?=$sale->id?>">Excluir</a>]
		 			</td>
		 		</tr>
			<?php endforeach ?>
		<?php endif ?>

	</table>
