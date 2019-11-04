<?php

require "../header.php";

 ?>

<h1>Novo cliente</h1>
<hr>
<form method="POST" action="new-costumer-proc.php">
    <label>Nome: </label>
    <input type="text" name="name">
    <br><br>
    <input type="submit" value="Cadastrar">
    <button type="button" onclick="window.location = 'costumers.php'">Voltar</button>
</form>


<?php require "../footer.php"; ?>
