<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipTypesTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('membership_types', function (Blueprint $table) {
			$table->id();
			$table->string('type');
			$table->integer('discount');
			$table->integer('yearly_fee');
			$table->timestamps();
		});

		Schema::table('customers', function (Blueprint $table) {
			$table->bigInteger('membership_type_id')->unsigned()->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('membership_types');

		Schema::table('customers', function (Blueprint $table) {
			$table->dropColumn('membership_type_id');
		});
	}
}
