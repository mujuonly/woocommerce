<?php

namespace Automattic\WooCommerce\Api;

use Automattic\WooCommerce\Api\Enums\WebhookApiType;
use Automattic\WooCommerce\Api\Enums\WebhookStatus;
use Automattic\WooCommerce\Api\InputTypes\CreateWebhookInput;
use Automattic\WooCommerce\Api\ObjectTypes\AnInt;
use Automattic\WooCommerce\Api\ObjectTypes\User;
use Automattic\WooCommerce\Api\ObjectTypes\Webhook;

class Webhooks {
	#[WebMutation( 'CreateWebhook' )]
	#[ArgDescription( 'input', 'The new webhook or something.' )]
	public function create_webhook( CreateWebhookInput $input ): Webhook {
		$w = new Webhook();

		$w->api_version      = $input->api_version;
		$w->date_created     = '2023-12-09 12:34:56';
		$w->id               = 1234;
		$w->delivery_url     = $input->delivery_url;
		$w->name             = $input->name;
		$w->failure_count    = 7;
		$w->pending_delivery = true;
		$w->secret           = $input->secret;
		$w->status           = $input->status;
		$w->topic            = $input->topic;
		$w->user             = new User();
		$w->user->id         = $input->user_id;
		$w->user->email      = 'konamiman@konamiman.com';
		$w->user->login      = 'konamiman';

		return $w;
	}

	#[WebMutation( 'CreateWebhooks' )]
	#[ArgArrayType('input',CreateWebhookInput::class)]
	#[ArrayType(Webhook::class)]
	#[ArgDescription( 'input', 'The new webhooks.' )]
	public function create_webhooks( array $input ): array {
		return array_map(fn($item) => $this->create_webhook($item), $input);
	}

	#[WebQuery( 'GetInts' )]
	#[ArgArrayType('ints', 'int')]
	#[ArrayType(AnInt::class)]
	#[ArgDescription( 'ints', 'The ints to return.' )]
	public function get_ints(array $ints): array {
		return array_map(fn($item) => new AnInt($item), $ints);
	}

	#[WebQuery( 'GetInt' )]
	#[ArgDescription( 'int', 'The int to return.' )]
	public function get_int(int $int): AnInt {
		return new AnInt($int);
	}

	#[WebQuery( 'Webhooks' )]
	#[ArrayType( Webhook::class )]
	#[Description( 'Go and get webhooks!' )]
	public function get_webhooks(): array {
		return array( $this->get_webhook( 111 ), $this->get_webhook( 222 ) );
	}

	#[WebQuery( 'EchoWebhook' )]
	public function echo_webhooks(CreateWebhookInput $input): Webhook {
		$w = new Webhook();
		// throw new \Exception("Eeeeeh!!!");
		// throw new \InvalidArgumentException("Whomp whomp!");
		$w->api_version      = $input->api_version;
		$w->date_created     = '2023-12-09 12:34:56';
		$w->id               = 1234;
		$w->delivery_url     = 'http://www.konamiman.com';
		$w->name             = 'Newhook';
		$w->failure_count    = 7;
		$w->pending_delivery = true;
		$w->secret           = $input->secret;
		$w->status           = WebhookStatus::PAUSED;
		$w->topic            = 'Topicazo';
		$w->user             = new User();
		$w->user->id         = 5678;
		$w->user->email      = 'konamiman@konamiman.com';
		$w->user->login      = 'konamiman';

		return $w;
	}

	// public function get_webhook(int $id, #[EnumType(WebhookStatus::class)] #[Description('A foobar maybe?')] string $foobar, ?array $_fields_info = null): ?Webhook {

	#[WebQuery( 'Webhook' )]
	#[ArgArrayType( '_fields_info', 'string' )]
	#[ArgDescription( 'id', 'The id, that is' )]
	// #[ArgEnumType('foobar', WebhookStatus::class)]
	public function get_webhook( int $id, ?array $_fields_info = null ): ?Webhook {
		$w = new Webhook();
		// throw new \Exception("Eeeeeh!!!");
		// throw new \InvalidArgumentException("Whomp whomp!");
		$w->api_version      = WebhookApiType::API_V3;
		$w->date_created     = '2023-12-09 12:34:56';
		$w->id               = $id;
		$w->delivery_url     = 'http://www.konamiman.com';
		$w->name             = 'Newhook';
		$w->failure_count    = 7;
		$w->pending_delivery = true;
		$w->secret           = 'Ssssh!!';
		$w->status           = WebhookStatus::PAUSED;
		$w->topic            = 'Topicazo';
		$w->user             = new User();
		$w->user->id         = 5678;
		$w->user->email      = 'konamiman@konamiman.com';
		$w->user->login      = 'konamiman';

		return $w;
	}
}
