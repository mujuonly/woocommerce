<?php

namespace Automattic\WooCommerce\Api;

use Automattic\WooCommerce\Api\ObjectTypes\AnInt;

class Foobars {

	#[WebQuery('Fizz')]
	public function fizz(): AnInt {
		return new AnInt(89);
	}
}
