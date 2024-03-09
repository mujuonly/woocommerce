<?php

namespace Automattic\WooCommerce\Internal\Api\DesignTime\Attributes;

#[\Attribute]
class WebMutationAttribute {
	public function __construct(
		public string $graphql_name,
		public ?string $rest_name = null
	)
	{}
}
