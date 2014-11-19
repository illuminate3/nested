<?php

class Site extends Eloquent {

    /**
     * The set of characters for testing slugs.
     *
     * @var  string
     */
//    public static $slugPattern = '[a-z0-9\-/]+';

//	protected $fillable = array('slug', 'title', 'body', 'parent_id');

//    protected $visible = array('title', 'slug', 'body', 'children');

// DEFINE Relationships --------------------------------------------------
/*
	public function page()
	{
		return $this->belongsTo('Page');
	}
*/

public function assets()
{
	return $this->belongsToMany('Asset');
}

public function rooms()
{
	return $this->belongsToMany('Room');
}


// Functions --------------------------------------------------

public function attachItem($id, $category)
{
	$item = Item::find($id);
	$item->categories()->attach($category);
}


}
