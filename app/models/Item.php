<?php

class Item extends \Eloquent {

	protected $guarded = array();

// DEFINE Rules --------------------------------------------------
	public static $rules = array(
		'make' => 'required',
		'model' => 'required',
		'model_number' => 'required',
		'description' => 'required',
//		'image' => 'required'
	);

// DEFINE Fillable --------------------------------------------------


// DEFINE Relationships --------------------------------------------------

public function categories()
{
	return $this->belongsToMany('Category');
//	return $this->belongsToMany('Category')->withPivot('category_item');
}

public function assets()
{
	return $this->belongsToMany('Asset');
}


// Functions --------------------------------------------------

public function attachItem($id, $category)
{
	$item = Item::find($id);
	$item->categories()->attach($category);
}


}
