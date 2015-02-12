<?php

class Vehicle extends HasOffenceImpl{

    protected   $table = 'rsmsa_vehicles';

    protected  $guarded = array('id');
	public $timestamps = false;
	
	//Get paid offences
	public function offences(){
		return $this->hasMany('Offence','vehicle_plate_number','plate_number');
	}
	//Get paid offences
	public function paidOffences(){
		return $this->offences()->where('paid', '=', true);
	}
	public function notPaidOffences(){
		return $this->offences()->where('paid', '=', false);
	}

    //returns accidents that a vehicle is associated with
    public function accidents(){
        return $this-> hasMany('AccidentVehicle' , 'vehicle_id');
    }

    public function insurance(){
        return $this->belongsTo('Insurance');
    }
}
