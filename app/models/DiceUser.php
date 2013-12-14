<?php

class DiceUser extends Eloquent {
	protected $table = 'dice_user';
	protected $guarded = array();

	public function users()
    {
        return $this->belongsToMany('App\Models\Users');
    }

    public function dices()
    {
        return $this->belongsToMany('App\Models\Dices');
    }
}
