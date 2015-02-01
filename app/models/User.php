<?php

class User extends Eloquent {

    /**
     * The set of characters for testing slugs.
     *
     * @var  string
     */
//    public static $slugPattern = '[a-z0-9\-/]+';

//	protected $fillable = array('slug', 'title', 'body', 'parent_id');

//    protected $visible = array('title', 'slug', 'body', 'children');

// DEFINE Relationships --------------------------------------------------

public function assets()
{
	return $this->belongsToMany('Asset', 'asset_user', 'asset_id', 'user_id');
}


// Functions --------------------------------------------------
/*
public function attachItem($id, $category)
{
	$item = Item::find($id);
	$item->categories()->attach($category);
}
*/

}
