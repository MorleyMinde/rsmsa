<?php

class Vehicle extends HasOffenceImpl{

    protected   $table = 'rsmsa_vehicles';
	
	protected $primaryKey = 'plate_number';
	public $timestamps = false;
	
	//Get paid offences
	public function offences(){
		return $this->hasMany('Offence','vehicle_plate_number');
	}
	//Get paid offences
	public function paidOffences(){
		return $this->offences()->where('paid', '=', true);
	}
	public function notPaidOffences(){
		return $this->offences()->where('paid', '=', false);
	}
}