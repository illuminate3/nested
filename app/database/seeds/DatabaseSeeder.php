<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
/*
		DB::table('asset_item')->truncate();
		DB::table('asset_room')->truncate();
		DB::table('asset_site')->truncate();
		DB::table('asset_user')->truncate();
		DB::table('assets')->delete();
			$statement = "ALTER TABLE assets AUTO_INCREMENT = 1;";
			DB::unprepared($statement);
		DB::table('category_item')->truncate();
		DB::table('items')->delete();
			$statement = "ALTER TABLE items AUTO_INCREMENT = 1;";
			DB::unprepared($statement);
		DB::table('sites')->delete();
			$statement = "ALTER TABLE sites AUTO_INCREMENT = 1;";
			DB::unprepared($statement);
*/
		Eloquent::unguard();

		$this->call('RoomsSeeder');
/*
		$this->call('SitesSeeder');
		$this->call('ItemsSeeder');
		$this->call('AssetsSeeder');

		$this->call('AssetAttachSeeder');
/*
		$this->call('AssetsTableSeeder');
		$this->call('AssetstatusesTableSeeder');
		$this->call('RoomsTableSeeder');
		$this->call('TechstatusesTableSeeder');
*/

	}

}
