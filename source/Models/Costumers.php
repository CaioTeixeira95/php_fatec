<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Costumers extends DataLayer {
	public function __construct() {
		parent::__construct("costumers", ["name"]);
	}
}