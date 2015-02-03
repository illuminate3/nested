<?php

class ItemsSeeder extends Seeder {

	public function run()
	{

//		DB::table('items')->truncate();

		$csv = dirname(__FILE__) . '/data/' . 'items.csv';
		$file_handle = fopen($csv, "r");

		while (!feof($file_handle)) {

			$line = fgetcsv($file_handle);
			if (empty($line)) {
				continue; // skip blank lines
			}

//			$table->increments('id');
//			$table->integer('category_id')->nullable();
//			$table->string('make')->nullable();
//			$table->string('model')->nullable();
//			$table->string('model_number')->nullable();
//			$table->text('description')->nullable();
//			$table->string('image')->nullable();


			$c = array();
			$c['id']				= $line[0];
			$c['category_id']		= $line[1];
			$c['make']				= $line[2];
			$c['model']				= $line[3];
			$c['model_number']		= $line[4];
			$c['description']		= $line[5];
			$c['image']				= $line[6];
			$c['created_at']		= $line[7];
			$c['updated_at']		= $line[8];

			DB::table('items')->insert($c);
		}

		fclose($file_handle);

	}

}
