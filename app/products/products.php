<?php

require "../header.php";

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Products;

$products_list = (new Products())->find()->order("id")->fetch(true);

?>

<h1>Cadastro de produto</h1>
<a href="new-product.php">Novo produto</a>
<hr>
<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th colspan="2">Ações</th>
    </tr>
    <?php foreach($products_list as $product): ?>
        <tr>
            <td><?=$product->id?></td>
            <td><?=$product->description?></td>
            <td><?=number_format($product->unit_value, 2, '.', '') ?? number_format(0.00, 2, '.', '')?></td>
            <td colspan="2">
                [<a href="product-edit.php?id=<?=$product->id?>">Editar</a>]
                [<a href="product-delete.php?id=<?=$product->id?>">Excluir</a>]
            </td>
        </tr>
    <?php endforeach ?>
</table>
<br><br>
<button type="button" onclick="window.location = '../index.php';">Voltar</a>

<?php require "../footer.php" ?>
