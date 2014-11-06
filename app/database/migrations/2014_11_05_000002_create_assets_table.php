<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table) {
			$table->increments('id');

//			$table->integer('asset_id');
			$table->integer('item_id');
			$table->integer('site_id')->nullable();
//			$table->string('custodian');			change to asset_user table
			$table->integer('room')->nullable();
//			$table->integer('user_id');
			$table->integer('statuses_tech_id');

			$table->string('asset_tag')->unique()->index();
			$table->string('serial')->unique()->index();
			$table->string('po')->index();

			$table->text('note')->nullable();
/*
			$table->integer('category_id')->nullable();
			$table->string('make')->nullable();
			$table->string('model')->nullable();
			$table->string('model_number')->nullable();
			$table->text('description')->nullable();
			$table->string('image')->nullable();
*/

			$table->softDeletes();
			$table->timestamps();

			$table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assets');
	}

}
