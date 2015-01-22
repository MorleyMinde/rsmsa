<?php
class AndroidController extends BaseController {

	/**
	 * Process tags from android requests.
	 */
	public function processtag($tag)
	{
		if($tag == 'verification_tag')
		{
			$licence_number = $_GET['license_number'];
			/*$arr = array();
			//$json = json_encode(array('status' => 'error'));
			
			//$json->push(array('code' => '1'));
			array_push($arr,array('status' => 'error'));
			//push error code
			array_push($arr,array('code' => '1'));
			return $arr;*/
			$driverJSON = Driver::where('license_number','=',$licence_number)->get();
			if(count($driverJSON) == 0)// If the licence is not registered return error 1
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
				//push the driver information array
				array_push($arr,array('driver'=>$driverJSON));
				//push the offences made by the driver
				array_push($arr,array('offences' => Offence::where('driver_license_number','=',$licence_number)->get()));
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
		echo json_encode($output, 128);
	}
}