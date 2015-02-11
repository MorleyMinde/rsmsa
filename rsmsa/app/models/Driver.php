<?php
/**
 * This is the Driver Model
 * 
 * @author Vincent P. Minde
 *
 */
class Driver extends HasOffenceImpl{

	protected $primaryKey = "license_number";
	protected $table= 'rsmsa_drivers';
	public $timestamps = false;
	
	public function offences(){
		return $this->hasMany('Offence','driver_license_number');
	}
	public function paidOffences(){
		return $this->offences()->where('paid', '=', true);
	}
	public function notPaidOffences(){
		return $this->offences()->where('paid', '=', false);
	}
}
