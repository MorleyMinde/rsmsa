<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/3/2015
 * Time: 3:46 PM
 */

class AccidentController extends BaseController{

    //Function to handle form submission to the server

    public function submitAccident(){
        $accident = new Accident;
        $accident -> accident_reg_number = Input::json()-> get('accident_reg_no');
        $accident -> accident_class = Input::json()-> get('class');
        $accident -> ocs_check = Input::json()-> get('ocs_check');
        $accident -> supervisor_check = Input::json()-> get('supervisor_check');
        $accident -> rank_no = Input::json()-> get('office1_rank_no');
        $accident -> sign_date = Input::json()-> get('dt');
        $accident -> accident_fatal = Input::json()-> get('fatal');
        $accident -> accident_severe_injury = Input::json()-> get('severe');
        $accident -> accident_simple_injury = Input::json()-> get('simple');
        $accident -> accident_only_damage = Input::json()-> get('damage');
        $accident -> latitude = Input::json()-> get('latitude');
        $accident -> longitude = Input::json()-> get('longitude');
        $accident -> hit_run = Input::json()-> get('hit');
        $accident -> accident_date_time = Input::json()-> get('dt');
        $accident -> accident_area = Input::json()-> get('area_name');
        $accident -> area_region = Input::json()-> get('region');
        $accident -> area_district = Input::json()-> get('district');
        $accident -> road_name = Input::json()-> get('road_name');
        $accident -> road_number = Input::json()-> get('road_no');
        $accident -> road_mark = Input::json()-> get('road_mark');
        $accident->cause = Input::json() -> get('cause');
        $accident->weather = Input::json() -> get('weather');
        $accident -> intersection_name = Input::json()-> get('intersection_name');
        $accident -> intersection_number = Input::json()-> get('intersection_no');
        $accident -> intersection_mark = Input::json()-> get('intersection_mark');

        $accident -> save();


        //enter driver details associated with the accident

        $driver_accident = new AccidentDriver();
        $driver_accident->accident()->associate($accident);

        //get current driver id
        $driver_license_id = Input::json() -> get('driver1_license_id');
        $driver =[];
        //$driver = Driver::where('license_number','=' ,$driver_license_id)->get('id');
        $driver_accident-> driver_id = 1;
        //end get current driver id

        $driver_accident->severity = Input::json() -> get('driver_severity');
        $driver_accident->phone_use = Input::json() -> get('driver_phone_use');
        $driver_accident->seat_belt = Input::json() -> get('seat_belt');
        $driver_accident->alcohol = Input::json() -> get('driver1_alcohol');

        $driver_accident->save();


        //enter vehicle details associated with the accident

        $vehicle_accident = new AccidentVehicle();
        $vehicle_accident->accident()->associate($accident);

        //get current vehicle id
        $vehicle_license_id = Input::json() -> get('vehicle_reg_no');
        //$vehicle = Vehicle::where('plate_number','=' ,$vehicle_license_id)->get();
        //$vehicle_id = $vehicle->id;
        $vehicle_accident->vehicle_id = 1;
        //end get current vehicle_id

        $vehicle_accident->vehicle_fatal = Input::json() -> get('vehicle_fatal');
        $vehicle_accident->vehicle_severe_injury = Input::json() -> get('vehicle_severe');
        $vehicle_accident->vehicle_simple_injury = Input::json() -> get('vehicle_simple');
        $vehicle_accident->vehicle_not_injured = Input::json() -> get('vehicle_not_injured');

        $vehicle_accident->save();



        //enter passenger details associated with the accident

        $passenger_accident = new AccidentPassenger();

        $passenger_accident->accident()->associate($accident);
        $passenger_accident->pass_name = Input::json() -> get('passenger_name');
        $passenger_accident->pass_gender = Input::json() -> get('passenger_gender');
        $passenger_accident->pass_dob = Input::json() -> get('passenger_dob');
        $passenger_accident->pass_physical_address = Input::json() -> get('passenger_p_address');
        $passenger_accident->pass_address = Input::json() -> get('passenger_address');
        $passenger_accident->pass_national_id = Input::json() -> get('passenger_nationality');
        $passenger_accident->pass_phone_number = Input::json() -> get('passenger_phone');
        $passenger_accident->pass_seat_belt = Input::json() -> get('passenger_seat_belt');
        $passenger_accident->pass_alcohol = Input::json() -> get('passenger_alcohol');
        $passenger_accident->pass_casuality = Input::json() -> get('passenger_casuality');

        $passenger_accident->save();


        //enter witness details associated with the accident

        $witness_accident = new AccidentWitness();

        $witness_accident->accident()->associate($accident);
        $witness_accident->witness_name = Input::json() -> get('witness_name');
        $witness_accident->witness_gender = Input::json() -> get('witness_gender');
        $witness_accident->witness_dob = Input::json() -> get('witness_dob');
        $witness_accident->witness_physical_address = Input::json() -> get('witness_p_address');
        $witness_accident->witness_address = Input::json() -> get('witness_address');
        $witness_accident->witness_national_id = Input::json() -> get('witness_nationality');
        $witness_accident->witness_phone_number = Input::json() -> get('witness_phone');

        $witness_accident->save();

    }

    public function getPoliceInfo($rank_no){

        $police = DB::table('rsmsa_police')
            ->join('rsmsa_stations', 'rsmsa_stations.id', '=', 'rsmsa_police.station_id')
            ->join('rsmsa_persons', 'rsmsa_persons.id', '=', 'rsmsa_police.person_id')
            ->where('rsmsa_police.rank_no','=',$rank_no)->get();

        return $police;

        }

    public function getDriverInfo($licence_id){

        $driver = Driver::where('license_number','=',$licence_id)->get();

        return $driver;

    }

    //Get All Accidents
 public  function getAccidents(){

     return Accident::all();
 }

    //Count All Accidents in a given class,district and year
    //@param -> $class,$district,$year
    public  function countAccidents($class,$district,$year)
    {
        $accidents = DB::table('rsmsa_accidents')
            ->join('rsmsa_accident_driver', 'rsmsa_accidents.id', '=', 'rsmsa_accident_driver.accident_id')
            ->join('rsmsa_accident_passenger', 'rsmsa_accidents.id', '=', 'rsmsa_accident_passenger.accident_id')
            ->where('rsmsa_accidents.accident_class', '=', $class)
            ->where('rsmsa_accidents.area_district', '=', $district)
            ->where(DB::raw('YEAR(rsmsa_accidents.sign_date)'), '=', $year)->get();
        return $accidents;
    }


    public  function viewAccident($accident_id){

        $accident = DB::table('rsmsa_accidents')
            ->join('rsmsa_accident_driver', 'rsmsa_accidents.id', '=', 'rsmsa_accident_driver.accident_id')
            ->join('rsmsa_accident_vehicle', 'rsmsa_accidents.id', '=', 'rsmsa_accident_vehicle.accident_id')
            ->join('rsmsa_accident_passenger', 'rsmsa_accidents.id', '=', 'rsmsa_accident_passenger.accident_id')
            ->join('rsmsa_accident_witness', 'rsmsa_accidents.id', '=', 'rsmsa_accident_witness.accident_id')
            ->where('rsmsa_accidents.id','=',$accident_id)->get();

        return $accident;
    }

//get driver info given the driver_id
    public  function getDriver($id){
        $driver = Driver::find($id)->get();
        return $driver;
    }

    //get driver info given the driver license
    public  function getDriverDetails($license){
        $driver = Driver::where('license_number', '=',$license)->get();
        return $driver;
    }

    //get driver info given the vehicle_id
    public  function getVehicle($id){
        $vehicle = Vehicle::find($id)->get();
        return $vehicle;
    }

    //get driver info given the plateNumber
    public  function getVehicleDetails($plateNumber)
    {
        $vehicle = Vehicle::where('plate_number' , '=' , $plateNumber)->get();
        return $vehicle;
    }

    //Get All Regions
    public  function getRegions(){

        return Region::all();
    }

//Get Districts by Name
    public  function getDistricts($name){

        $districts = DB::table('regions')
            ->join('districts', 'regions.id', '=', 'districts.region_id')
            ->where('regions.name','=',$name)->get();

        return $districts;
    }

//Get All Accidents by Driver's License Id
    public  function getAccidentsByDriver($license_id){

        $accidents = DB::table('rsmsa_accidents')
            ->join('rsmsa_accident_driver', 'rsmsa_accidents.id', '=', 'rsmsa_accident_driver.accident_id')
            ->join('rsmsa_drivers', 'rsmsa_drivers.id', '=', 'rsmsa_accident_driver.driver_id')
            ->where('rsmsa_drivers.license_number','=',$license_id)->get();

        return $accidents;
    }

//Get All Accidents by Vehicle's Plate Number
    public  function getAccidentsByVehicle($plateNumber){
        $accidents = DB::table('rsmsa_accidents')
            ->join('rsmsa_accident_vehicle', 'rsmsa_accidents.id', '=', 'rsmsa_accident_vehicle.accident_id')
            ->join('rsmsa_vehicles', 'rsmsa_vehicles.id', '=', 'rsmsa_accident_vehicle.vehicle_id')
            ->where('rsmsa_vehicles.plate_number','=',$plateNumber)->get();


        return $accidents;
    }

    //Export a reported accident in PDF
    public function downloadAccident()
    {
        $pdf = PDF::loadHTML('<h1>Hello World!!</h1>');
        return $pdf->download('accident.pdf'); //this code is used for the name pdf
    }
} 