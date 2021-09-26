<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTables extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('description')->nullable();
			$table->integer('price')->unsigned();
			$table->integer('stock')->unsigned();
			$table->softDeletes();
			$table->boolean('published')->nullable();
			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}
}
