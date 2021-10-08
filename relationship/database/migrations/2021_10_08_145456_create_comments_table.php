<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('comments', function (Blueprint $table) {
			$table->id();
			$table->string('content');
			$table->foreignId('user_id')
				->constrained('users')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->bigInteger('commentable_id')->nullable();
			$table->string('commentable_type')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('comments');
	}
}
