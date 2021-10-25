<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokensTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		DB::table('tokens')->insert([
			'key' => 'indonesia-hebat',
			'access' => 'admin',
			'created_at' => new DateTime(),
			'updated_at' => new DateTime(),
		]);

		DB::table('tokens')->insert([
			'key' => 'bandung-juara',
			'access' => 'editor',
			'created_at' => new DateTime(),
			'updated_at' => new DateTime(),
		]);
	}
}
