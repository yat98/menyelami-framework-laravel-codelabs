<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTables extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('customer_id');
			$table->date('paid_at')->nullable();
			$table->timestamps();
		});

		Schema::create('orders_products', function (Blueprint $table) {
			$table->bigInteger('order_id');
			$table->bigInteger('product_id');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('orders');
		Schema::dropIfExists('orders_products');
	}
}
