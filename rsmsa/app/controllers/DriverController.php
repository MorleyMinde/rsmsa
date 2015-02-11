<?php
/**
 * This is the driver controller
 * 
 * @author Vincent P. Minde
 *
 */
class DriverController extends BaseController {
	/**
	 * Gets the Driver
	 * 
	 * @param string $license_number
	 */
	public function getDriver($license_number)
	{
		return Driver::find($license_number);
	
	}
	/**
	 * Get offences made by a vehicle
	 *
	 * @param string $license_number
	 */
	public function getOffences($license_number){
		$driver = Driver::find($license_number);
		return $driver->getObjectOffencesJSON(Offence::appendAmoutToOffences($driver->offences));
	}
	/**
	 * Get offences made by a vehicle that are paid
	 *
	 * @param string $license_number
	 */
	public function getPaidOffences($license_number){
		$driver = Driver::find($license_number);
		return $driver->getObjectOffencesJSON(Offence::appendAmoutToOffences($driver->paidOffences));
	}
	/**
	 * Get offences made by a vehicle that are not paid
	 *
	 * @param string $license_number
	 */
	public function getNotPaidOffences($license_number){
		$driver = Driver::find($license_number);
		return $driver->getObjectOffencesJSON(Offence::appendAmoutToOffences($driver->notPaidOffences));
	}
}