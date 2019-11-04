<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Costumers;

if (!empty($_POST['name'])) {

    $name = addslashes($_POST['name']);
    $costumer = new Costumers();
    $costumer->name = $name;

    $costumer->save();

}

header("Location: costumers.php");
