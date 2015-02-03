<?php

class SitesSeeder extends Seeder {

	public function run()
	{

//		DB::table('sites')->truncate();
		DB::table('sites')->delete();
			$statement = "ALTER TABLE sites AUTO_INCREMENT = 1;";
			DB::unprepared($statement);

		$csv = dirname(__FILE__) . '/data/' . 'bam-sites.csv';
		$file_handle = fopen($csv, "r");

		while (!feof($file_handle)) {

			$line = fgetcsv($file_handle);
			if (empty($line)) {
				continue; // skip blank lines
			}

//			$table->increments('id');
//			$table->string('name',100);
//			$table->string('email',100)->nullable();
//			$table->string('primary_phone',20)->nullable();
//			$table->string('secondary_phone',20)->nullable();
//			$table->string('website',100)->nullable();
//			$table->string('address',100)->nullable();
//			$table->string('city',100)->nullable();
//			$table->string('state',60)->nullable();
//			$table->string('zipcode',20)->nullable();
//			$table->string('logo',100)->nullable();
//			$table->integer('user_id')->default(1);
//			$table->integer('division_id')->nullable();
//			$table->string('ad_code',10)->nullable();
//			$table->string('bld_number',10)->nullable();
//			$table->integer('status_id')->default(1);
//			$table->text('notes')->nullable();


			$c = array();
			$c['id']				= $line[0];
			$c['name']				= $line[1];
//			$c['description']		= $line[2];
//			$c['principal_sg']		= $line[3];
//			$c['teacher_sg']		= $line[4];
//			$c['student_sg']		= $line[5];
			$c['created_at']		= $line[6];
			$c['updated_at']		= $line[7];

			$c['email']				= NULL;
			$c['primary_phone']		= NULL;
			$c['secondary_phone']	= NULL;
			$c['website']			= NULL;
			$c['address']			= NULL;
			$c['city']				= NULL;
			$c['state']				= NULL;
			$c['zipcode']			= NULL;
			$c['logo']				= NULL;
			$c['user_id']			= 1;
			$c['division_id']		= NULL;
			$c['ad_code']			= NULL;
			$c['bld_number']		= NULL;
			$c['status_id']			= 1;
			$c['notes']				= NULL;

			DB::table('sites')->insert($c);
		}

		fclose($file_handle);

	}

}
