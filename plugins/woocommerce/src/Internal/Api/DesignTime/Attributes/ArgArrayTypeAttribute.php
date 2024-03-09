<?php

namespace Automattic\WooCommerce\Internal\Api\DesignTime\Attributes;

#[\Attribute]
class ArgArrayTypeAttribute {
	public function __construct(
		public string $arg_name,
		public string $class_name,
		public bool $nullable = false
	)
	{}
}
