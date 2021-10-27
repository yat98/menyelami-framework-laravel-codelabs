<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();
		Post::factory(5)->create();
		Customer::factory(5)->create();
		Model::unguard();
		$this->call(TokensTableSeeder::class);
		Model::reguard();
	}
}
