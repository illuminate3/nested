<?php

class AssetAttachSeeder extends Seeder {

	public function run()
	{

//		DB::table('assets')->truncate();

		$csv = dirname(__FILE__) . '/data/' . 'assets.csv';
		$file_handle = fopen($csv, "r");

		while (!feof($file_handle)) {

			$line = fgetcsv($file_handle);
			if (empty($line)) {
				continue; // skip blank lines
			}

$c = array();

$id = $line[0];
$item_id = $line[1];
$user_id = 1;
$site_id = $line[2];
$room_id = 1;

//$this->attachAsset($id, $item_id);
	$d = array();
	$d['asset_id']				= $id;
	$d['item_id']				= $item_id;
	DB::table('asset_item')->insert($d);

//$this->attachUser($id, $user_id);
	$e = array();
	$e['asset_id']				= $id;
	$e['user_id']				= $user_id;
	DB::table('asset_user')->insert($e);

//$this->attachSite($id, $site_id);
	$f = array();
	$f['asset_id']				= $id;
	$f['site_id']				= $site_id;
	DB::table('asset_site')->insert($f);

//$this->attachRoom($id, $room_id);
	$g = array();
	$g['asset_id']				= $id;
	$g['room_id']				= $room_id;
	DB::table('asset_room')->insert($g);

		}

		fclose($file_handle);

	}

}
