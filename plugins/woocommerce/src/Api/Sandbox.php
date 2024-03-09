<?php

namespace Automattic\WooCommerce\Api;

use Automattic\WooCommerce\Api\Enums\MsxGeneration;
use Automattic\WooCommerce\Api\Enums\OrdinalNumber;
use Automattic\WooCommerce\Api\InputTypes\GetPopulatedSimpleTypeInput;
use Automattic\WooCommerce\Api\Interfaces\IdentifiableObject;
use Automattic\WooCommerce\Api\ObjectTypes\ComplexType;
use Automattic\WooCommerce\Api\ObjectTypes\IdentifiableObjectX;
use Automattic\WooCommerce\Api\ObjectTypes\SimpleType;

#[Description('Sandbox API class with misc methods.')]
class Sandbox {
	#[WebQuery('RandomSimpleType')]
	#[Description('Get an instance of SimpleType with random(ish)values.')]
	public function get_random_simple_type(): SimpleType {
		$t = new SimpleType();
		$t->id = 1000;
		$t->name = "Simple type " . $t->id;
		$t->the_string = 'Some string';
		$t->the_int = 34;
		$t->the_float = 12.34;
		$t->the_bool = true;
		$t->the_array_of_ints = [1,2,3,4];
		$t->the_array_of_nullable_ints = [1,null,2,null,3];
		$t->the_ordinal_number = OrdinalNumber::SECOND;
		$t->the_msx_generations = [MsxGeneration::MSX2, MsxGeneration::MSX2PLUS];
		return $t;
	}

	#[WebQuery('RandomSimpleTypes')]
	#[ArrayType(SimpleType::class)]
	#[Description('Get a few instances of SimpleType with random(ish)values.')]
	public function get_random_simple_types(#[Description('How many instances to get?')] ?int $how_many = 3): array {
		if($how_many < 1 || $how_many > 100) {
			throw new \InvalidArgumentException("\$how_many must be at least 1 and at most 100.");
		}
		$result = [];
		for($i=1; $i<=$how_many; $i++) {
			$instance = $this->get_random_simple_type();
			$instance->id = $i;
			$instance->name = "Simple type " . $i;
			$result[] = $instance;
		}
		return $result;
	}

	#[WebQuery('PopulatedSimpleType')]
	#[Description('Get an instance of SimpleType with values populated from the input.')]
	public function get_populated_simple_type(GetPopulatedSimpleTypeInput $input): SimpleType {
		$value = $this->get_random_simple_type();
		$value->the_int = $input->the_input_int;
		$value->the_float = $input->the_input_float;
		$value->the_msx_generations = $input->the_input_msx_generations;
		if(!is_null($input->the_input_string)) {
			$value->the_string = $input->the_input_string;
		}

		return $value;
	}

	#[WebQuery('ComplexType')]
	#[Description('Get an instance of ComplexType with random(ish)values.')]
	public function get_random_complex_type(): ComplexType {
		$t = new ComplexType();

		$t->id = 2000;
		$t->name = 'Complex type ' . $t->id;
		$t->the_simple_type = $this->get_random_simple_type();
		$t->the_array_of_simple_types = $this->get_random_simple_types();

		return $t;
	}

	#[WebQuery('IdentifiableObjects')]
	#[ArrayType(IdentifiableObject::class)]
	public function get_identifiable_objects(): array {
		return [
			$this->get_random_simple_type(),
			$this->get_random_complex_type()
		];
	}
}
