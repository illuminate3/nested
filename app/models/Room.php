<?php

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
	return $this->belongsToMany('Asset');
}

public function sites()
{
	return $this->belongsToMany('Site');
}

// Functions --------------------------------------------------


}
