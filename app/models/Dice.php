<?php

class Dice extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'rolled' => 'required'
	);

	public function users()
    {
        return $this->belongsToMany('App\Models\Users');
    }
}
