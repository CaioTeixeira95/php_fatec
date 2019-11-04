<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Products extends DataLayer {
	public function __construct() {
		parent::__construct("products", ["description", "unit_value"], "id", false);
	}
}
