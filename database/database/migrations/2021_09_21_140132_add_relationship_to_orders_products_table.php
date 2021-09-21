<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToOrdersProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::table('orders_products', function (Blueprint $table) {
			$table->bigInteger('order_id')
				->unsigned()
				->change();

			$table->foreign('order_id')
				->references('id')
				->on('orders')
				->onUpdate('cascade')
				->onDelete('restrict');

			$table->bigInteger('product_id')
				->unsigned()
				->change();

			$table->foreign('product_id')
				->references('id')
				->on('products')
				->onUpdate('cascade')
				->onDelete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::table('orders_products', function (Blueprint $table) {
			$table->dropForeign(['order_id']);
			$table->dropForeign(['product_id']);
		});
	}
}
