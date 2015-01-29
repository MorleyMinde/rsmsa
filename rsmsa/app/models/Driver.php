<?php

class Driver extends Eloquent{

	public $timestamps = false;

    protected $table= 'rsmsa_drivers';

	public function offences(){
		return $this->hasMany('Offence');
	}
}