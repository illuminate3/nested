<?php

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder {

	public function run()
	{
//		Category::truncate();
		DB::table('categories')->delete();
			$statement = "ALTER TABLE categories AUTO_INCREMENT = 1;";
			DB::unprepared($statement);

		$categories = require __DIR__.'/data/categories.php';

		foreach ($categories as $category)
		{
			Category::create($category);
		}
	}

}
