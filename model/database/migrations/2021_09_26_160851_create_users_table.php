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
			$table->string('email');
			$table->string('firstname')->nullable();
			$table->string('lastname')->nullable();
			$table->string('password');
			$table->string('birth_date')->nullable();
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
