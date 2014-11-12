<?php

class Item extends Eloquent {
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

}
