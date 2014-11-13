<?php

class AssetStatus extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'AssetStatuss';

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
	
		'name' => 'required',
		'description' => 'required'
	
*/
	);

	public static $rulesUpdate = array(
/*
	
		'name' => 'required',
		'description' => 'required'
	
*/
	);


// DEFINE Fillable --------------------------------------------------
	protected $fillable = array();


// DEFINE Relationships --------------------------------------------------


// Functions --------------------------------------------------


}
