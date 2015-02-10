<?php

class Driver extends Eloquent{

	public $timestamps = false;

    protected $table= 'rsmsa_drivers';

	public function offences(){
		return $this->hasMany('Offence');
	}

    //returns accidents that a driver is associated with
    public function accidents(){

        return $this-> hasMany('AccidentDriver' , 'driver_id');
    }
}