<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('tokens', function (Blueprint $table) {
			$table->id();
			$table->string('key');
			$table->string('access');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('tokens');
	}
}
