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

			$table->integer('user_id')->nullable();
			$table->integer('item_id')->nullable();
			$table->integer('site_id')->nullable();
			$table->integer('room')->nullable();
			$table->integer('asset_status_id')->nullable();
			$table->string('asset_tag')->nullable();
			$table->string('serial')->nullable();
			$table->string('po')->nullable();
			$table->string('barcode')->nullable();
			$table->text('note')->nullable();

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
