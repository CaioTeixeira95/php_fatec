<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Sales extends DataLayer {

	public function __construct() {
		parent::__construct("sales", ["id_costumer", "id_payment_method"]);
	}

	public function getCostumer() {
		return (new Costumers())->findById($this->id_costumer);
	}

	public function getItems() {
		return (new SalesItems())->find("id_sale = :sale", "sale={$this->id}")->fetch(true);
	}

	public function getPaymentMethod() {
		return (new PaymentMethod())->findById($this->id_payment_method);
	}

}