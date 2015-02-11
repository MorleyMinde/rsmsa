<?php

class DriverController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Driver::all();
	}

    public function getDriver($license_number)
    {
        return Driver::find($license_number);

    }
	public function getOffences($license_number){
		$driver = Driver::find($license_number);
		return $driver->getObjectOffencesJSON(Offence::appendAmoutToOffences($driver->offences));
	}
	public function getPaidOffences($license_number){
		$driver = Driver::find($license_number);
		return $driver->getObjectOffencesJSON(Offence::appendAmoutToOffences($driver->paidOffences));
	}
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
                    echo json_encode($reader->get(array('surname', 'other_names','national_id','phone_number','gender','date_of_birth','gender','date_of_birth','national','driving_license_id','occupation'))->toArray());
//                    foreach( as $arr){
//
//                        foreach($arr as $key=>$arr1){
//                           if($arr1 != ""){echo $key." -- ".$arr1."  ";}
//                        }
//
//                    }
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
		Driver::create(Input::all());
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
		//
	}

}
