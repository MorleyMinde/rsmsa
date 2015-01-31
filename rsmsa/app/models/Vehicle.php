<?php

class Vehicle extends Eloquent{

    protected   $table = 'rsmsa_vehicles';
	
	protected $primaryKey = 'plate_number';
	public $timestamps = false;
}