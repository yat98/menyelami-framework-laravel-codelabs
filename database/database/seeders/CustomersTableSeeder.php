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
		$membershipTypeId = [null, 1, 2];
		foreach (range(1, 10) as $index) {
			DB::insert('INSERT INTO customers (name, phone, address, membership_type_id) VALUES (:name, :phone, :address, :membership_type_id)', [
				'name' => $faker->name(),
				'phone' => $faker->phoneNumber(),
				'address' => $faker->address(),
				'membership_type_id' => $membershipTypeId[rand(0, 2)],
			]);
		}

		$this->command->info('Success add customers!');
	}
}
