<?php

class Bank extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'dice_id' => 'required',
		'user_id' => 'required'
	);
}
