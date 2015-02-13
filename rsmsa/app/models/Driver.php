<?php
/**
 * This is the Driver Model
 * 
 * @author Vincent P. Minde
 *
 */
class Driver extends HasOffenceImpl{

	public $timestamps = false;

    protected $table= 'rsmsa_drivers';
    protected  $guarded = array('id');
	
	public function offences(){
		return $this->hasMany('Offence','driver_license_number','license_number');
	}

    //returns accidents that a driver is associated with
    public function accidents(){

        return $this-> hasMany('AccidentDriver' , 'driver_id');
    }	
    public function paidOffences(){
		return $this->offences()->whereIn("id",OffenceReceipt::get(array("offence_id"))->lists("offence_id"));
	}
	public function notPaidOffences(){
		return $this->offences()->whereNotIn("id",OffenceReceipt::get(array("offence_id"))->lists("offence_id"));
	}
}
