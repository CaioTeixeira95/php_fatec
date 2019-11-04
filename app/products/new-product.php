<?php

require "../header.php";

 ?>

<h1>Novo produto</h1>
<hr>
<form method="POST" action="new-product-proc.php">
    <label>Descrição: </label>
    <input type="text" name="description">
    <br><br>
    <label>Valor: </label>
    <input type="text" name="value">
    <br><br>
    <input type="submit" value="Cadastrar">
    <button type="button" onclick="window.location = 'product.php'">Voltar</button>
</form>


<?php require "../footer.php"; ?>
