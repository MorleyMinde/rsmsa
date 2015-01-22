<?php

class Driver extends Eloquent{

	public $timestamps = false;
	
	public function offences(){
		return $this->hasMany('Offence');
	}
}