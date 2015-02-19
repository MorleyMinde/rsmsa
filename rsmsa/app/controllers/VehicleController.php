<?php
/**
 * The Vehicle Controller
 * 
 * @author Vincent P. Minde
 *
 */
class VehicleController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Vehicle::all();
    }

    /**
     * Display a listing of the ownership category.
     *
     * @return Response list of category
     */
    public function getOwnership()
    {
        return VehicleOwnership::all();
    }

    /**
     * Display a listing of Car Year of Manufacture
     *
     * @return Response list of category
     */
    public function getCarYear()
    {
        return VehicleModelYear::orderBy('year','DESC')->distinct()->get(array('year'));
    }

    /**
     * Display a listing of CarMake
     *
     * @return Response list of category
     */
    public function getCarMake()
    {
        return VehicleModelYear::distinct()->get(array('make'));
    }

    /**
     * Display a listing of CarMake
     *
     * @param make
     * @return Response list of category
     */

    public function getCarModel($make)
    {
        return VehicleModelYear::where('make',$make)->get(array('model'));
    }

    /**
     * Display a listing of CarMake
     *
     * @param make
     * @return Response list of category
     */

    public function getAllModel()
    {
        return VehicleModelYear::distinct()->get(array('model'));
    }

    /**
	 * Gets the vehicle
	 * 
	 * @param string $plate_number
	 */
	public function getVehicle($plate_number)
	{
		return Vehicle::find($plate_number);
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

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        Vehicle::create(Input::all());
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
     *TODO delete also all associated offences and accidents
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  column
     * @param  int  value
     * @return Response
     */
    public function getValue($column,$value)
    {
        return Vehicle::where($column,$value)->get()->count();
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
                    $arr = $reader->get(array(
                        'registration_number','vehicle_control_number','owner_id_number','full_name',
                        'ownership_category','postal_address','car_make','car_model','model_number',
                        'body_type','color','class','year_of_manufacture','chassis_number','engine_number',
                        'engine_capacity','fuel_used','number_of_axial','axial_distance','seating_capacity',
                        'gross_weight','tare_weight','imported_from'
                    ))->toArray();
                    //json_encode($arr);exit;
                    $duplicate = array();
                    $newVals   = array();
//                    echo json_encode($reader->get(array('surname', 'other_names','national_id','phone_number','gender','date_of_birth','gender','date_of_birth','national','driving_license_id','occupation','driving _class','expiry_date'))->toArray());
                    foreach($arr as $vehicle){
                        if(Vehicle::where('plate_number',$vehicle['registration_number'])->first()){
                            array_push($duplicate,$vehicle);
                        }else{
                            array_push($newVals,$vehicle);
                            Vehicle::create(array(
                                'plate_number' => $vehicle['registration_number'],
                                'owner_name' => $vehicle['full_name'],
                                'owner_address' => $vehicle['postal_address'],
                                'make' => $vehicle['car_make'],
                                'type' => $vehicle['car_model'],
                                'color' => $vehicle['color'],
                                'yom' => $vehicle['year_of_manufacture'],
                                'chasis_no' => $vehicle['chassis_number'],
                                'vehicle_control_number' => $vehicle['vehicle_control_number'],
                                'owner_id' => $vehicle['owner_id_number'],
                                'ownership_category' => $vehicle['ownership_category'],
                                'body_type' => $vehicle['body_type'],
                                'model_number' => $vehicle['model_number'],
                                'class' => $vehicle['class'],
                                'engine_number' => $vehicle['engine_number'],
                                'engine_capacity' => $vehicle['engine_capacity'],
                                'fuel' => $vehicle['fuel_used'],
                                'number_of_axial' => $vehicle['number_of_axial'],
                                'axial_distance' => $vehicle['axial_distance'],
                                'seating_capacity' => $vehicle['seating_capacity'],
                                'tare_weight' => $vehicle['tare_weight'],
                                'gross_wheight' => $vehicle['gross_weight'],
                                'imported_from' => $vehicle['imported_from']
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

}