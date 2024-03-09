<?php

namespace Automattic\WooCommerce\Api\Enums;

#[Description( 'Webhook API type enum!' )]
class WebhookApiType {
	#[Description( 'API v1 payload' )]
	public const API_V1 = 'wp_api_v1';

	#[Description( "You don't say!!" )]
	public const API_V2    = 'wp_api_v2';
	public const API_V3    = 'wp_api_v3';
	#[Description( 'Legacy API v3 payload' )]
	public const LEGACY_V3 = 'legacy_v3';

	public const FOO = 34;
}
