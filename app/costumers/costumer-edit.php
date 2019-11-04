<?php

require "../header.php";
require __DIR__."/../../vendor/autoload.php";

use Source\Models\Costumers;

if (empty($_GET['id']) && !is_numeric($_GET['id'])) {
    header("Location: costumers.php");
    exit;
}

$id = addslashes($_GET['id']);
$costumer = (new Costumers())->findById($id);

 ?>

<h1>Editar cliente</h1>
<hr>
<form method="POST" action="costumers-edit-proc.php">
    <input type="hidden" name="id_costumer" value="<?=$costumer->id?>">
    <label>Nome: </label>
    <input type="text" name="name" value="<?=$costumer->name?>">
    <br><br>
    <input type="submit" value="Alterar">
    <button type="button" onclick="window.location = 'costumers.php'">Voltar</button>
</form>


<?php require "../footer.php"; ?>
