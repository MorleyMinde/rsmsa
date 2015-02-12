<?php
/**
 * The Vehicle Controller
 * 
 * @author Vincent P. Minde
 *
 */
class VehicleController extends BaseController {
	/**
	 * Gets the vehicle
	 * 
	 * @param string $plate_number
	 */
	public function getVehicle($plate_number)
	{
		return Vehicle::where("plate_number","=",$plate_number)->first();
	}
	/**
	 * Get offences made by a vehicle
	 * 
	 * @param string $plate_number
	 */
	public function getOffences($plate_number){
		$vehicle = Vehicle::find($plate_number);
		return $vehicle->getObjectOffencesJSON(Offence::appendAmoutToOffences($vehicle->offences));
	}
	/**
	 * Gets offences of the vehicle that are paid
	 * 
	 * @param string $plate_number
	 */
	public function getPaidOffences($plate_number){
		$vehicle = Vehicle::find($plate_number);
		return $vehicle->getObjectOffencesJSON(Offence::appendAmoutToOffences($vehicle->paidOffences));
	}
	/**
	 * Gets offences of the vehicle that are not paid
	 *
	 * @param string $plate_number
	 */
	public function getNotPaidOffences($plate_number){
		$vehicle = Vehicle::find($plate_number);
		return $vehicle->getObjectOffencesJSON(Offence::appendAmoutToOffences($vehicle->notPaidOffences));
	}
}