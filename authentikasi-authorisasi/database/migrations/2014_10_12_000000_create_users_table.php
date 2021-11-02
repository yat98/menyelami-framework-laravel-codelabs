<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('username')->unique();

			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60)->nullable();

			$table->string('provider');
			$table->string('provider_id')->unique()->nullable();
			$table->string('avatar');

			$table->timestamp('email_verified_at')->nullable();
			$table->boolean('suspend')->default(0);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
