<?php

namespace Automattic\WooCommerce\Api\Interfaces;

use Automattic\WooCommerce\Api\Enums\WebhookApiType;
use Automattic\WooCommerce\Api\Enums\WebhookStatus;
use Automattic\WooCommerce\Api\ObjectTypes\User;
use Automattic\WooCommerce\Api\ObjectTypes\Webhook;

#[Description( 'Represents a webhook definition.' )]
trait WebhookDefinition {
	public string $name;

	#[Description( 'The topic of the webhook.' )]
	public string $topic;

	public string $delivery_url;

	public ?string $secret;

	#[EnumType( WebhookApiType::class )]
	public string $api_version;
	/*
	#[ArrayType('string')]
	#[EnumType(WebhookApiType::class)]
	public array $array_of_api_versions;

	public int $the_int;

	public ?bool $the_nullable_bool;

	public float $the_float;

	public string $the_string;

	#[ArrayType('int', true)]
	public array $the_nullable_ints_array;

	#[ArrayType('string')]
	public ?array $the_strings_nullable_array;

	#[ArrayType('boolean', true)]
	public array $the_nullable_booleans_nullable_array;
	*/
	// private int $the_private;

	// public Webhook $the_webhook;

	// public User $the_user;
}
