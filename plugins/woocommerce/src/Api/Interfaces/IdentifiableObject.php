<?php

namespace Automattic\WooCommerce\Api\Interfaces;

#[Description('Represents an identifiable object.')]
trait IdentifiableObject {
	#[Description('Object id')]
	public ?int $id;

	public ?string $name;
}
