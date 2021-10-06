<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('preferences', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')
				->constrained('users')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->char('country', 2);
			$table->char('currency', 3);
			$table->integer('subscribe_mailing_list');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('preferences');
	}
}
