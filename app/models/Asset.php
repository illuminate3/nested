<?php //namespace models;

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
	return $this->belongsToMany('Item', 'asset_item', 'asset_id', 'item_id');
}

public function rooms()
{
	return $this->belongsToMany('Room', 'asset_room', 'asset_id', 'room_id');
}

public function sites()
{
	return $this->belongsToMany('Site', 'asset_site', 'asset_id', 'site_id');
}

public function users()
{
	return $this->belongsToMany('User', 'asset_user', 'asset_id', 'user_id');
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
	$item = Asset::find($id);
	$item->items()->attach($item_id);
}
public function detachAsset($id, $item_id)
{
	$item = Asset::find($id)->items()->detach();
}

public function attachSite($id, $site_id)
{
	$item = Asset::find($id);
	$item->sites()->attach($site_id);
}
public function detachSite($id, $site_id)
{
	$item = Asset::find($id)->sites()->detach();
}

public function attachUser($id, $user_id)
{
	$item = Asset::find($id);
	$item->users()->attach($user_id);
}
public function detachUser($id, $user_id)
{
	$item = Asset::find($id)->users()->detach();
}

public function attachRoom($id, $room_id)
{
	$item = Asset::find($id);
	$item->rooms()->attach($room_id);
}
public function detachRoom($id, $room_id)
{
	$item = Asset::find($id)->rooms()->detach();
}



}
