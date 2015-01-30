<?php

class Driver extends Eloquent{

	protected $primaryKey = "license_number";
	public $timestamps = false;
	
	public function offences(){
		return $this->hasMany('Offence');
	}
}