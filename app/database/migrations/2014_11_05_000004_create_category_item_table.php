<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryItemTable extends Migration
{

	public function __construct()
	{
		// Get the prefix
//		$this->prefix = Config::get('vedette::vedette_db.prefix', '');
//		$this->prefix = Config::get('vedette.vedette_db.prefix', '');
		$this->prefix = '';
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::create($this->prefix.'role_user', function(Blueprint $table)
		Schema::create('category_item', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->integer('category_id')->unsigned()->index();
			$table->integer('item_id')->unsigned()->index();

			$table->foreign('category_id')->references('id')->on($this->prefix.'categories')->onDelete('cascade');
			$table->foreign('item_id')->references('id')->on($this->prefix.'items')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::drop($this->prefix.'category_item');
		Schema::drop('category_item');
	}

}
