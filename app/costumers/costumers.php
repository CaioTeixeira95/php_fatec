<?php

require "../header.php";

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Costumers;

$costumers_list = (new Costumers())->find()->fetch(true);

?>

<h1>Cadastro de cliente</h1>
<a href="new-costumer.php">Novo cliente</a>
<hr>
<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th colspan="2">Ações</th>
    </tr>
    <?php foreach($costumers_list as $costumer): ?>
        <tr>
            <td><?=$costumer->id?></td>
            <td><?=$costumer->name?></td>
            <td colspan="2">
                [<a href="costumer-edit.php?id=<?=$costumer->id?>">Editar</a>]
                [<a href="costumer-delete.php?id=<?=$costumer->id?>">Excluir</a>]
            </td>
        </tr>
    <?php endforeach ?>
</table>
<br><br>
<button type="button" onclick="window.location = '../index.php';">Voltar</a>

<?php require "../footer.php" ?>
