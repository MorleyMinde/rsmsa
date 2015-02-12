<?php
/**
 * This is the driver controller
 * 
 * @author Vincent P. Minde, Kelvin Mbwilo
 *
 */
class DriverController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Driver::all();
	}

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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
	 * Show the list of available driving classes
	 *
	 * @return Response
	 */
	public function drivingClasses()
	{
        return DrivingClasses::all();
	}

    /**
	 * Uploading the drives via excel
	 *
	 * @return Response
	 */
	public function upload()
	{
        if (Input::hasFile('file'))
        {
            $file = Input::file('file'); // your file upload input field in the form should be named 'file'
            $destinationPath = public_path().'/uploads';
            $filename = $file->getClientOriginalName();
            //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
            $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
            chmod($destinationPath ."/".$filename , 0777);
            if($uploadSuccess ){
                Excel::load($destinationPath ."/".$filename, function($reader) {
                    $reader->toArray();
                   $arr = $reader->get(array('surname', 'other_names','national_id','phone_number','physcal_adress','address_po_box','gender','date_of_birth','nationality','driving_license_id','occupation','driving_class','expiry_date'))->toArray();
                    //json_encode($arr);exit;
                    $duplicate = array();
                    $newVals   = array();
//                    echo json_encode($reader->get(array('surname', 'other_names','national_id','phone_number','gender','date_of_birth','gender','date_of_birth','national','driving_license_id','occupation','driving _class','expiry_date'))->toArray());
                    foreach($arr as $driver){
                        if(Driver::where('license_number',$driver['driving_license_id'])->first()){
                            array_push($duplicate,$driver);
                        }else{
                            array_push($newVals,$driver);
                            Driver::create(array(
                                'license_number' => $driver['driving_license_id'],
                                'first_name' =>$driver['other_names'],
                                'last_name' =>$driver['surname'],
                                'physical_address' =>$driver['physcal_adress'],
                                'address' =>$driver['address_po_box'],
                                'national_id' =>$driver['national_id'],
                                'gender' =>$driver['gender'],
                                'birthdate' =>$driver['date_of_birth'],
                                'nationality' =>$driver['nationality'],
                                'phone_number' =>$driver['phone_number'],
                                'occupation' =>$driver['occupation'],
                                'driving_class' => $driver['driving_class'],
                                'expiry_date' =>$driver['expiry_date'],
                            ));
                        }
                    }
                    $retunArr = array("duplicates"=>$duplicate,"newValue"=>$newVals);
                    echo json_encode($retunArr);
                });
            }
        }else{
            echo "no file";
        }

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Driver::create(array(
            'license_number' => Input::get('license_number'),
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'physical_address' => Input::get('physical_address'),
            'address' => Input::get('address'),
            'national_id' => Input::get('national_id'),
            'gender' => Input::get('gender'),
            'birthdate' => Input::get('birthdate'),
            'nationality' => Input::get('nationality'),
            'phone_number' => Input::get('phone_number'),
            'occupation' => Input::get('occupation'),
            'driving_class' => implode ( "," , Input::get('driving_class') ),
            'expiry_date' => Input::get('expiry_date'),
        ));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Driver::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$driver = Driver::find($id);
        $driver->delete();
	}

}
