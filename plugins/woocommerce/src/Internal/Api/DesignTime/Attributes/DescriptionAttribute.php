<?php

namespace Automattic\WooCommerce\Internal\Api\DesignTime\Attributes;

use \Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS_CONSTANT | Attribute::TARGET_METHOD | Attribute::TARGET_PARAMETER)]
class DescriptionAttribute {
	public function __construct(
		public string $description
	)
	{}
}
