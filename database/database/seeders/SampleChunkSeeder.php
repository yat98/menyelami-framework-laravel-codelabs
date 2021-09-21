<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleChunkSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		$faker = Faker::create(config('app.faker_locale'));
		$products = ['Accord', 'Civic', 'City', 'CR-V', 'Jazz', 'Freed', 'Mobilio'];
		$description = ['Tipe Manual', 'Tipe Otomatis'];

		foreach (range(1, 10000) as $index) {
			DB::insert('INSERT INTO products (name, description, price, stock) VALUES (:name, :description, :price, :stock)', [
				'name' => $products[rand(0, 6)] . ' ' . $faker->name(),
				'description' => $description[rand(0, 1)],
				'price' => rand(100, 800) * 1000000,
				'stock' => rand(10, 40),
			]);
		}

		$this->command->info('Success add 10.000 cars!');
	}
}
