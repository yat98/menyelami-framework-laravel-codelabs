<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();
		User::create([
			'name' => 'doni',
			'email' => 'doni@gmail.com',
			'password' => bcrypt('rahasia'),
		]);
	}
}
