<?php

class Vehicle extends Eloquent{
	
	protected $primaryKey = 'plate_number';
	public $timestamps = false;
}