<?php
class VehicleController extends BaseController {
	public function getVehicle($plate_number)
	{
		return Vehicle::find($plate_number);
	}
	public function getOffences($plate_number){
		$vehicle = Vehicle::find($plate_number);
		return $vehicle->getObjectOffencesJSON(Offence::appendAmoutToOffences($vehicle->offences));
	}
	public function getPaidOffences($plate_number){
		$vehicle = Vehicle::find($plate_number);
		return $vehicle->getObjectOffencesJSON(Offence::appendAmoutToOffences($vehicle->paidOffences));
	}
	public function getNotPaidOffences($plate_number){
		$vehicle = Vehicle::find($plate_number);
		return $vehicle->getObjectOffencesJSON(Offence::appendAmoutToOffences($vehicle->notPaidOffences));
	}
}