<?php
class VehicleController extends BaseController {
	public function getVehicle($plate_number)
	{
		return Vehicle::find($plate_number);
	}
}