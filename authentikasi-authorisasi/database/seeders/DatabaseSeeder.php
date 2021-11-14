<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Organization;
use App\Models\User;
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
		Model::unguard();

		$jajang = User::create([
			'name' => 'jajang Soepandi',
			'username' => 'jajang',
			'email' => 'jajang@mail.com',
			'role' => 'organizer',
			'membership' => 'gold',
			'password' => bcrypt('rahasia'),
		]);

		$ucok = User::create([
			'name' => 'Ucok Prayogo',
			'username' => 'ucok',
			'email' => 'ucok@mail.com',
			'role' => 'organizer',
			'membership' => 'platinum',
			'password' => bcrypt('rahasia'),
		]);

		$beni = User::create([
			'name' => 'Beni Prayogo',
			'username' => 'beni',
			'email' => 'beni@mail.com',
			'role' => 'participant',
			'membership' => 'gold',
			'password' => bcrypt('rahasia'),
		]);

		$meetupJS = Event::create([
			'organizer_id' => $jajang->id,
			'name' => 'Meetup JS Jakarta',
			'description' => 'Kumpul bareng developer JS',
			'location' => 'Balai Kartini',
			'begin_date' => '2016-03-10',
			'finish_date' => '2016-03-11',
			'published' => 1,
		]);

		$meetupLaravel = Event::create([
			'organizer_id' => $ucok->id,
			'name' => 'Meetup Laravel Bandung',
			'description' => 'Kumpul bareng developer Laravel',
			'location' => 'Sabuga',
			'begin_date' => '2016-04-02',
			'finish_date' => '2016-04-05',
			'published' => 0,
		]);

		$organization = Organization::create([
			'name' => 'Artisan Bandung',
			'admin_id' => $ucok->id,
		]);

		Model::reguard();
	}
}
