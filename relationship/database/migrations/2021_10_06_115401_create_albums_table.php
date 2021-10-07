<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('albums', function (Blueprint $table) {
			$table->id();
			$table->foreignId('artist_id')
				->constrained('artists')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->string('title');
			$table->date('released');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('albums');
	}
}
