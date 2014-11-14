<?php

class Asset extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'assets';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	protected $guarded = array();



// DEFINE Rules --------------------------------------------------
	public static $rules = array(
/*
	
		'item_id' => 'required',
		'site_id' => 'required',
		'room' => 'required',
		'statuses_tech_id' => 'required',
		'asset_tag' => 'required',
		'serial' => 'required',
		'po' => 'required',
		'note' => 'required'
	
*/
	);

	public static $rulesUpdate = array(
/*
	
		'item_id' => 'required',
		'site_id' => 'required',
		'room' => 'required',
		'statuses_tech_id' => 'required',
		'asset_tag' => 'required',
		'serial' => 'required',
		'po' => 'required',
		'note' => 'required'
	
*/
	);


// DEFINE Fillable --------------------------------------------------
	protected $fillable = array();


// DEFINE Relationships --------------------------------------------------


public function items()
{
	return $this->belongsToMany('Item');
}

public function sites()
{
	return $this->belongsToMany('Site');
}

public function users()
{
	return $this->belongsToMany('User');
}

// Functions --------------------------------------------------

public function getItems()
{
	$items = DB::table('items')->lists('model', 'id');
	return $items;
}

public function getSites()
{
	$sites = DB::table('sites')->lists('name', 'id');
	return $sites;
}

public function getUsers()
{
	$users = DB::table('users')->lists('email', 'id');
	return $users;
}


public function getStatuses()
{
	$statuses = DB::table('asset_statuses')->lists('name', 'id');
	return $statuses;
}

public function attachAsset($id, $item_id)
{
//	$item = Item::find($id);
//	$item->categories()->attach($category_id);
	$asset = Asset::find($id);
	$asset->items()->attach($item_id);
}

public function attachSite($id, $site_id)
{
	$asset = Asset::find($id);
	$asset->sites()->attach($site_id);
}

public function attachUser($id, $user_id)
{
	$asset = Asset::find($id);
	$asset->users()->attach($user_id);
}




}
