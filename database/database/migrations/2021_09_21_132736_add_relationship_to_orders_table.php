<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::table('orders', function (Blueprint $table) {
			$table->bigInteger('customer_id')
				->unsigned()
				->change();

			$table->foreign('customer_id')
				->references('id')
				->on('customers')
				->onUpdate('cascade')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign(['customer_id']);
		});
	}
}
