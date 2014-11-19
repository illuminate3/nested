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

public function rooms()
{
	return $this->belongsToMany('Room');
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

public function getRooms()
{
	$sites = DB::table('rooms')->lists('name', 'id');
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

public function attachRoom($id, $room_id)
{
	$asset = Asset::find($id);
	$asset->rooms()->attach($room_id);
}


public function detachAsset($id, $item_id)
{
//	$item = Item::find($id);
//	$item->categories()->attach($category_id);
	$asset = Asset::find($id);
	$asset->items()->detach($item_id);
}

public function detachSite($id, $site_id)
{
	$asset = Asset::find($id);
	$asset->sites()->detach($site_id);
}

public function detachUser($id, $user_id)
{
	$asset = Asset::find($id);
	$asset->users()->detach($user_id);
}

public function detachRoom($id, $room_id)
{
	$asset = Asset::find($id);
	$asset->rooms()->detach($room_id);
}

public function syncAsset($id, $item_id)
{
//	$item = Item::find($id);
//	$item->categories()->attach($category_id);
	$asset = Asset::find($id);
	$asset->items()->sync($item_id);
}

public function syncSite($id, $site_id)
{
	$asset = Asset::find($id);
	$asset->sites()->sync($site_id);
}

public function syncUser($id, $user_id)
{
	$asset = Asset::find($id);
	$asset->users()->sync($user_id);
}

public function syncRoom($id, $room_id)
{
	$asset = Asset::find($id);
	$asset->rooms()->sync($room_id);
}


}
