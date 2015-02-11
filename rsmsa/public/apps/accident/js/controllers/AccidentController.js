/**
 * Created by PAUL on 2/1/2015.
 */

//Controller to handle accident form .
angular.module("accidentApp").controller('AccidentFormCtrl' , function($scope,$http){

    //Function to handle Accident form submission

    $scope.sendAccident = function(accident){
        $http.post('/api/accident' ,accident).success(function(data){
        console.log(data);
        alert('Accident Reported successfully.');

        }).error(function(error) {
            alert('Please fill all contents.');
            console.log(error);
        });
    }

$scope.accident={
    "office1_rank_no" : ""
};
//get police information given the rank number
    $scope.getPolice = function() {
        $rank_no = "R111" ;
        $http.get("/accident/police/" + $rank_no)
            .success(function(data) {
                console.log(data[0]);
                    $scope.accident.police_station= data[0].name;
                    $scope.accident.office1_name = data[0].first_name + " " + data[0].last_name ;
                    $scope.accident.station_region = data[0].region;
                    $scope.accident.station_district = data[0].district;


            }).error(function(error) {
                alert("Err:"+error);
                $scope.data.error = error;
            });
    }

    //Fetch driver information given the license number.
    $scope.getDriver = function() {
        $license_id = 'T64747 ABB';
        $http.get("/model/driver/" + $license_id)
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
        $param = "T673 ABD";
        console.log($param);
        $http.get("/model/vehicle/" + $param)
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
    //fetch police information given the rank
    $scope.police = {};
    $scope.$watch('offence.vehicle_plate_number', function (newValue, oldValue) {

        if(newValue != '')
        {
            $http.get("/model/police/" + $scope.police.rank).success(
                function(data) {
                    // alert(data[0].make);
                    if (data.length > 0) {
                        $scope.police.station = data[1].name;
                    } else {
                        $scope.police.station = "";
                    }

                }).error(function(error) {
                    alert(error);
                    $scope.data.error = error;
                });
        }
    });

});

