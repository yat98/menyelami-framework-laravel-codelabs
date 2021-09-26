<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		$faker = Factory::create(config('app.faker_locale'));
		foreach (range(1, 10) as $i) {
			DB::table('posts')->insert([
				'title' => $faker->sentence(),
				'content' => $faker->paragraph(),
				'published' => rand(0, 1),
			]);
		}

		$this->command->info('Success add posts');
	}
}
