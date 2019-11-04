<?php

require __DIR__."/../../vendor/autoload.php";

use Source\Models\Costumers;

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {

    $id = addslashes($_GET['id']);
    $costumer = (new Costumers())->findById($id);

    $costumer->destroy();

}

header("Location: costumers.php");
