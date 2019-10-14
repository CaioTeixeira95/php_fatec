<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class SalesItems extends DataLayer {

	public function __construct() {
		parent::__construct("sales_items", ["id_product", "id_sale", "quantity", "price"], "id", false);
	}
	
}