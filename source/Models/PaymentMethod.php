<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class PaymentMethod extends DataLayer {
	public function __construct() {
		parent::__construct("payment_method", ["description"]);
	}
}