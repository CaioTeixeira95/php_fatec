<?php

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {

	$id_sale = addslashes($_GET['id']);
	$sale = (new Sales())->findById($id_sale);

	if($sale->fail()) {
		echo $user->fail()->getMessage();
	}
	else {
		$sale->destroy();
	}

}

header("Location: index.php");