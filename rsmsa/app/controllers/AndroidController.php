<?php
class AndroidController extends BaseController {

	/**
	 * Process tags from android requests.
	 */
	public function processtag($tag)
	{
		if($tag == 'verification_tag')
		{
			$licence_number = null;
			$plate_no = null;
			$driverJSON = null;
			$vehicleJSON = null;
			if(isset($_GET['license_number'])){
				$licence_number = $_GET['license_number'];
				$driverJSON = Driver::where('license_number','=',$licence_number)->first();
			}
			
			if(isset($_GET['plate_number'])){
				$plate_no = $_GET['plate_number'];
				$vehicleJSON = Vehicle::where('plate_number','=',$plate_no)->first();
			}
			
			if($driverJSON === null && $vehicleJSON === null)// If the licence is not registered return error 1
			{
				//Initiate the error status array
				$arr = array();
				//$json = json_encode(array('status' => 'error'));
				
				//$json->push(array('code' => '1'));
				array_push($arr,array('status' => 'error'));
				//push error code
				array_push($arr,array('code' => 1));
				return $this->getJSON($arr);
			}else {
				$arr = array();
				//Initiate the success status array
				array_push($arr,array('status'=>'ok'));
				//push the offences made by the driver
				$offences = new Offence();
				if($licence_number != null)
				{
					//push the driver information array
					array_push($arr,array('driver'=>$driverJSON));
					
					$offences->where('driver_license_number','=',$licence_number);
				}
				if($plate_no != null)
				{
					
					//Append insuraence infromation
					$vehicleJSON->appendInsurance();
						
					//Append road license infromation
					$vehicleJSON->appendRoadLicense();
						
					//Append inspection infromation
					$vehicleJSON->appendInspection();
					
					//push the vehicle information array
					array_push($arr,array('vehicle'=>$vehicleJSON));
					$offences->where('vehicle_plate_number','=',$plate_no);
				}
				
				//push the offences made by the driver
				if($plate_no != null || $licence_number != null){
					$offences = $offences->get();
					$offenceReturn = array();
					foreach($offences as $off)
					{
						$off->offence_date = strtotime($off->offence_date) * 1000;
						$offence_events =  OffenceEvent::where('offence_id','=',$off->id)->get();
						$events = array();
						foreach($offence_events as $offEvent)
						{
							$offence_registry = OffenceRegistry::where('id','=',$offEvent->offence_registry_id)->get();
							array_push($events,$offence_registry);
						}
						$off->events = $events;
						array_push($offenceReturn,$off);
					}
					array_push($arr,array('offences' => $offenceReturn));
				}
				
				return $this->getJSON($arr);
			}
		}
	}
	public function getJSON($data)
	{
		$output = array();
		foreach($data as $v) {
			$output[key($v)] = current($v);
		}
		return json_encode($output, 128);
	}
}