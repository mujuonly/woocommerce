<?php

namespace Automattic\WooCommerce\Internal\Api\DesignTime\Attributes;

use \Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS_CONSTANT | Attribute::TARGET_METHOD)]
class ArgDescriptionAttribute {
	public function __construct(
		public string $arg_name,
		public string $description
	)
	{}
}
