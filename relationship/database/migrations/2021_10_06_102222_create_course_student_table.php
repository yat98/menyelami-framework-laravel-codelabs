<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('course_student', function (Blueprint $table) {
			$table->foreignId('course_id')
				->constrained('courses')
				->onUpdate('cascade')
				->onUpdate('cascade');
			$table->foreignId('student_id')
				->constrained('students')
				->onUpdate('cascade')
				->onUpdate('cascade');
			$table->primary(['course_id', 'student_id']);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('course_student');
	}
}
