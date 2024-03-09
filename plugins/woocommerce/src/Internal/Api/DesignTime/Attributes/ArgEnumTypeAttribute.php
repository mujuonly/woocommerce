<?php

namespace Automattic\WooCommerce\Internal\Api\DesignTime\Attributes;

#[\Attribute]
class ArgEnumTypeAttribute {
	public function __construct(
		public string $arg_name,
		public string $class_name
	)
	{}
}
