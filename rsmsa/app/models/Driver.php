<?php
class Driver extends Eloquent{

	protected $primaryKey = "license_number";
	protected $table= 'rsmsa_drivers';
	public $timestamps = false;
	
	public function offences(){
		return $this->hasMany('Offence');
	}
}
