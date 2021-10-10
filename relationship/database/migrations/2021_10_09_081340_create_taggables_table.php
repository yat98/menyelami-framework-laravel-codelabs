<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('taggables', function (Blueprint $table) {
			$table->unsignedBigInteger('tag_id');
			$table->unsignedBigInteger('taggable_id')->nullable();
			$table->string('taggable_type')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('taggables');
	}
}
