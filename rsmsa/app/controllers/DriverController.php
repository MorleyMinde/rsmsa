<?php
class DriverController extends BaseController {
	public function getDriver($license_number)
	{
		return Driver::find($license_number);
	
	}
}