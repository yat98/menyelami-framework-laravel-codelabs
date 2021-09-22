<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run()
	{
		Model::unguard();
		// \App\Models\User::factory(10)->create();
		$this->call(ProductsTableSeeders::class);
		$this->call(CustomersTableSeeder::class);
		// $this->call(SampleChunkSeeder::class);
		$this->call(MembershipTypesTableSeeder::class);
	}
}
