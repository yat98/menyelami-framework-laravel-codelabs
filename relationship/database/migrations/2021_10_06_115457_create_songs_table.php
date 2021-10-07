<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('songs', function (Blueprint $table) {
			$table->id();
			$table->foreignId('album_id')
				->constrained('albums')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->string('title');
			$table->string('length');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('songs');
	}
}
