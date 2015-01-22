<?php
class Offence extends Eloquent{

	/**
	 * Returns the offences registered according to
	 *
	 * @see OffenceRegistry Model
	 *
	 * @return array of OffenceRegistry Object
	 */
	
	public function offenceRegistries()
	{
		return $this->belongsToMany('OffenceRegistry','offence_events','offence_id','offence_registry_id');
	}
	/**
	 * Returns the vehicle involved in the offence
	 * 
	 * @see Vehicle Model
	 * 
	 * @return Object(Vehicle)
	 */
	public function vehicle()
	{
		return $this->hasOne('Vehicle');
	}
	/**
	 * Returns the driver involved in the offence
	 *
	 * @see Driver Model
	 *
	 * @return Object(Driver)
	 */
	public function driver()
	{
		return $this->hasOne('Driver');
	}
	
	/**
	 * Returns the police involved in issueing an offence
	 *
	 * @see Driver Model
	 *
	 * @return Object(Police)
	 */
	public function police()
	{
		return $this->hasOne('Police');
	}
}