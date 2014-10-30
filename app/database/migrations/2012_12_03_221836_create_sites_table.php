<?php

class CreateSitesTable {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sites', function($table){
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->string('principal_sg');
			$table->string('teacher_sg');
			$table->string('student_sg');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sites');
	}

}