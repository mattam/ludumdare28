<?php

class DiceUser extends Eloquent {
	protected $table = 'dice_user';
	protected $guarded = array();

	public function users()
    {
        return $this->belongsToMany('User');
    }

    public function dices()
    {
        return $this->belongsToMany('Dice');
    }
}
