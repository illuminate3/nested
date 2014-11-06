<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetSiteTable extends Migration
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
		Schema::create('asset_sites', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->integer('asset_id')->unsigned()->index();
			$table->integer('site_id')->unsigned()->index();

			$table->foreign('asset_id')->references('id')->on($this->prefix.'assets')->onDelete('cascade');
			$table->foreign('site_id')->references('id')->on($this->prefix.'sites')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::drop($this->prefix.'role_user');
		Schema::drop($this->prefix.'asset_sites');
	}

}
