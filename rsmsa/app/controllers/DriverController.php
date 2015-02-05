<?php
class DriverController extends BaseController {
	public function getDriver($license_number)
	{
		return Driver::find($license_number);
	
	}
	public function getOffences($license_number){
		$driver = Driver::find($license_number);
		return appendAmoutToOffences($driver->offences);
	}
	public function getPaidOffences($license_number){
		$driver = Driver::find($license_number);
		return Offence::appendAmoutToOffences($driver->paidOffences);
	}
	public function getNotPaidOffences($license_number){
		$driver = Driver::find($license_number);
		return Offence::appendAmoutToOffences($driver->notPaidOffences);
	}
}