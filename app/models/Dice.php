<?php

class Dice extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'rolled' => 'required'
	);
}
