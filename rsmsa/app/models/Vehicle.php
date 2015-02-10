<?php

class Vehicle extends Eloquent{

    protected   $table = 'rsmsa_vehicles';


	public $timestamps = false;

    //returns accidents that a vehicle is associated with
    public function accidents(){
        return $this-> hasMany('AccidentVehicle' , 'vehicle_id');
    }

    public function insurance(){
        return $this->belongsTo('Insurance');
    }
}