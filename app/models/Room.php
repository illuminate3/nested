<?php //namespace models;

class Room extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Rooms';

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

		'site_id' => 'required',
		'user_id' => 'required',
		'name' => 'required',
		'description' => 'required'

*/
	);

	public static $rulesUpdate = array(
/*

		'site_id' => 'required',
		'user_id' => 'required',
		'name' => 'required',
		'description' => 'required'

*/
	);


// DEFINE Fillable --------------------------------------------------
	protected $fillable = array();


// DEFINE Relationships --------------------------------------------------

public function assets()
{
	return $this->belongsToMany('Asset', 'asset_room', 'asset_id', 'room_id');
}

public function sites()
{
	return $this->belongsToMany('Site');
}

// Functions --------------------------------------------------


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

}
