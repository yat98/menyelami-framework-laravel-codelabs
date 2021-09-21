<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		$faker = Faker::create(config('app.faker_locale'));
		foreach (range(1, 10) as $index) {
			DB::insert('INSERT INTO customers (name, phone, address) VALUES (:name, :phone, :address)', [
				'name' => $faker->name(),
				'phone' => $faker->phoneNumber(),
				'address' => $faker->address(),
			]);
		}

		$this->command->info('Success add customers!');
	}
}
