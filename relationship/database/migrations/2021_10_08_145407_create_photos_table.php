<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('photos', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('filename');
			$table->foreignId('user_id')
				->constrained('users')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('photos');
	}
}
