<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('events', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('organizer_id');
			$table->string('name');
			$table->text('description');
			$table->string('location');
			$table->date('begin_date');
			$table->date('finish_date');
			$table->boolean('published')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('events');
	}
}
