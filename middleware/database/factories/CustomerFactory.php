<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Customer::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$gender = ['M', 'F'];

		return [
			'name' => $this->faker->name(),
			'gender' => $gender[rand(0, 1)],
			'address' => $this->faker->address(),
		];
	}
}
