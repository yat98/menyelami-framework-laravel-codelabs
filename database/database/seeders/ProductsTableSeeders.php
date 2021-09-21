<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeders extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		DB::insert('INSERT INTO products (name, price, stock) VALUES (:name,:price,:stock)', [
			'name' => 'BRIO Sport E',
			'price' => 1800000000,
			'stock' => 14,
		]);

		DB::insert('INSERT INTO products (name, price, stock) VALUES (:name,:price,:stock)', [
			'name' => 'BRIO Satya E',
			'price' => 1259000000,
			'stock' => 23,
		]);

		$products = ['Accord', 'Civic', 'City', 'CR-V', 'Jazz', 'Freed', 'Mobilio'];
		$description = ['Tipe Manual', 'Tipe Otomatis'];

		foreach ($products as $product) {
			DB::insert('INSERT INTO products (name, description, price, stock) VALUES (:name, :description, :price, :stock)', [
				'name' => $product,
				'description' => $description[rand(0, 1)],
				'price' => rand(100, 800) * 100000,
				'stock' => rand(10, 40),
			]);
		}

		$this->command->info('Success add products!');
	}
}
