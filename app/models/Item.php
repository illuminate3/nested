<?php //namespace models;

use lib\presenters\PresentableTrait;

/*
use Eloquent;
use DB;
*/

class Item extends Eloquent {

	use PresentableTrait;

	/**
	 * The model presenter.
	 *
	 * @var string
	 */
	protected $presenter = 'lib\presenters\presenter\Category';

	protected $guarded = array();

// DEFINE Rules --------------------------------------------------
	public static $rules = array(
/*
		'make' => 'required',
		'model' => 'required',
		'model_number' => 'required',
		'description' => 'required',
//		'image' => 'required'
*/
	);

// DEFINE Fillable --------------------------------------------------


// DEFINE Relationships --------------------------------------------------


public function categories()
{
	return $this->belongsToMany('Category', 'category_item', 'item_id', 'category_id');
}

public function assets()
{
	return $this->belongsToMany('Asset', 'asset_item', 'item_id', 'asset_id');
}

/*
public function assets()
{
	return $this->hasMany('Asset');
}
public function categories()
{
	return $this->belongsToMany('Category');
//	return $this->belongsToMany('Category')->withPivot('category_item');
}

public function assets()
{
	return $this->belongsToMany('Asset');
}
*/

// Functions --------------------------------------------------

public function attachItem($id, $category_id)
{
	$item = Item::find($id);
	$item->categories()->attach($category_id);
}

public function detachItem($id, $category_id)
{
	$item = Item::find($id)->categories()->detach();
}

/*
public function syncItem($id, $category_id)
{
	$item = Item::find($id);

// this is not a proper array
	$item->categories()->sync($category_id);
}
*/

}
