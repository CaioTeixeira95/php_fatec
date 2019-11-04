<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Costumers;

if (!empty($_POST['id_costumer']) &&
    is_numeric($_POST['id_costumer']) &&
    !empty($_POST['name'])
) {

    $id = addslashes($_POST['id_costumer']);
    $name = addslashes($_POST['name']);

    $costumer = (new Costumers())->findById($id);

    if ($costumer->fail()) {
        echo $costumer->fail()->getMessage();
        header("Location: costumers.php");
        exit;
    }

    $costumer->name = $name;
    $costumer->save();

}

header("Location: costumers.php");
