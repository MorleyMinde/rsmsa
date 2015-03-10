/**
 * Created by PAUL on 2/1/2015.
 */

//Controller to handle accident form .
angular.module("accidentApp")

    .controller('DateController', function($scope) {

        //options for angular date picker
        $scope.dateOptions = {
            changeYear: true,
            changeMonth: true,
            yearRange: '1900:-0'
        }
    })
    .controller('AccidentFormCtrl' , function($scope,$http){

        $scope.accidentCurrentSaving = false;
        $scope.accidentSavedSuccess = false;
        $scope.accidentSavedFalue = false;

    //Function to handle Accident form submission

    $scope.sendAccident = function(accident){

        $scope.accidentCurrentSaving = true;
        $http.post('/api/accident' ,accident).success(function(data){
        console.log(data);
            $scope.accidentCurrentSaving = false;
            $scope.accidentSavedSuccess = true;
            $scope.accidentSavedFalue = false;

        }).error(function(error) {
            $scope.accidentCurrentSaving = false;
            $scope.accidentSavedSuccess = false;
            $scope.accidentSavedFailure = true;
            console.log(error);
        });
    }

$scope.accident={
    "office1_rank_no" : ""
};

$scope.driver = {
    "driver1_license_id" : ""
};


$scope.vehicle = {
   "vehicle_reg_no" : ""
};


//get police information given the rank number
    $scope.getPolice = function() {

        $http.get("/accident/police/" + $scope.accident.office1_rank_no)
            .success(function(data) {
                console.log(data[0]);
                    $scope.accident.police_station= data[0].name;
                    $scope.accident.office1_name = data[0].first_name + " " + data[0].last_name ;
                    $scope.accident.station_region = data[0].region;
                    $scope.accident.station_district = data[0].district;


            }).error(function(error) {
               // alert("Err:"+error);
                $scope.data.error = error;
            });
    }

    //Fetch driver information given the license number.
    $scope.getDriver = function() {

        $http.get("/api/accident/driver/license/" +  $scope.driver.driver1_license_id)
            .success(function(data) {
                    console.log(data[0]);
                    $scope.driver1_surname = data[0].first_name;
                    $scope.driver1_othernames = data[0].last_name;
                    $scope.driver1_p_add = data[0].physical_address;
                    $scope.driver1_address = data[0].address;
                    $scope.driver1_national_id = data[0].national_id;
                    $scope.driver1_gender = data[0].gender;
                    $scope.driver1_phone_no = data[0].phone_number;
                    $scope.driver1_dob = data[0].birthdate;
                    $scope.driver1_nationality = data[0].nationality;
                    $scope.driver1_occupation = data[0].occupation;
            }).error(function(error) {
                //alert(error);
                console.log(error);
            });
    }


    //Fetch vehicle information given the plate number.
    $scope.getVehicle = function() {

        $http.get("/api/accident/vehicle/plate/" + $scope.vehicle.vehicle_reg_no)
            .success(function(data) {
                console.log(data[0]);
                $scope.vehicle_type = data[0].make;
                $scope.vehicle_owner_name = data[0].owner_name;
                $scope.vehicle_owner_nationality = data[0].owner_nationality;
                $scope.vehicle_owner_p_addr = data[0].owner_physical_address;
                $scope.vehicle_owner_address = data[0].owner_address;
                $scope.vehicle_yom = data[0].yom;
                $scope.vehicle_chasis_no = data[0].chasis_no;


            }).error(function(error) {
                //alert(error);
                console.log(error);
            });
    }

});

