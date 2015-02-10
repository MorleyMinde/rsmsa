/**
 * Created by PAUL on 2/5/2015.
 */
angular.module('accidentApp').controller('AccidentListController',function($scope,$http) {
    $scope.accidents = {};
    $http.get("/api/accidents").success(function(data) {
        $scope.accidents = data;
    });
}).controller('ViewAccidentController', ['$scope', '$routeParams','$http',
        function($scope, $routeParams ,$http) {
            $accident_id = $routeParams.accident_id;

            $scope.accidents = {};

            $http.get("/api/accident/" + $accident_id)
                .success(function(data) {
                    console.log(data[0]);
                    $scope.accident_no = data[0].accident_reg_number;
                    $scope.ocs_check = data[0].ocs_check;
                    $scope.supervisor_check = data[0].ocs_check;
                    $scope.rank_no = data[0].rank_no;
                    $scope.sign_date = data[0].sign_date;
                    $scope.accident_fatal = data[0].accident_fatal;
                    $scope.accident_severe_injury = data[0].accident_severe_injury;
                    $scope.accident_simple_injury = data[0].accident_simple_injury;
                    $scope.accident_only_damage = data[0].accident_only_damage;
                    $scope.latitude = data[0].latitude;
                    $scope.longitude = data[0].longitude;
                    $scope.hit_run = data[0].hit_run;
                    $scope.accident_date_time = data[0].accident_date_time;
                    $scope.accident_area = data[0].accident_area;
                    $scope.area_region = data[0].area_region;
                    $scope.area_district = data[0].area_district;
                    $scope.road_name = data[0].road_name;
                    $scope.road_number = data[0].road_number;
                    $scope.road_mark = data[0].road_mark;
                    $scope.intersection_name = data[0].intersection_name;
                    $scope.intersection_number = data[0].intersection_number;
                    $scope.intersection_mark = data[0].intersection_mark;
                    $scope.vehicle_severe_injury = data[0].vehicle_severe_injury;

                    //get passenger details on this accident
                    $scope.pass_name = data[0].pass_name;
                    $scope.pass_gender = data[0].pass_gender;
                    $scope.pass_dob = data[0].pass_dob;
                    $scope.pass_physical_address = data[0].pass_physical_address;
                    $scope.pass_address = data[0].pass_address;
                    $scope.pass_national_id = data[0].pass_national_id;
                    $scope.pass_phone_number = data[0].pass_phone_number;
                    $scope.pass_alcohol = data[0].pass_alcohol;
                    $scope.pass_seat_belt = data[0].pass_seat_belt;
                    $scope.pass_casuality = data[0].pass_casuality;

                    //get witness details on this accident
                    $scope.witness_name = data[0].witness_name;
                    $scope.witness_gender = data[0].witness_gender;
                    $scope.witness_dob = data[0].witness_dob;
                    $scope.witness_physical_address = data[0].witness_physical_address;
                    $scope.witness_address = data[0].witness_address;
                    $scope.witness_national_id = data[0].witness_national_id;
                    $scope.witness_phone_number = data[0].witness_phone_number;

                    //driver details
                    $driver_id = data[0].driver_id;
                    $http.get("/api/accident/driver/" + $driver_id)
                        .success(function(driver) {
                            console.log(driver[0]);
                            $scope.license_number = driver[0].license_number;
                            $scope.first_name = driver[0].first_name;
                            $scope.last_name = driver[0].last_name;
                            $scope.physical_address = driver[0].physical_address;
                            $scope.address = driver[0].address;
                            $scope.national_id = driver[0].national_id;
                            $scope.gender = driver[0].gender;
                            $scope.birthdate = driver[0].birthdate;
                            $scope.nationality = driver[0].nationality;
                            $scope.phone_number = driver[0].phone_number;
                            $scope.occupation = driver[0].occupation;

                        }).error(function(error) {
                            console.log(error);
                        });

                    //vehicle details
                    $vehicle_id = data[0].vehicle_id;
                    $http.get("/api/accident/vehicle/" + $vehicle_id)
                        .success(function(vehicle) {
                            console.log(vehicle[0]);
                            $scope.plate_number = vehicle[0].plate_number;
                            $scope.owner_name = vehicle[0].owner_name;
                            $scope.owner_nationality = vehicle[0].owner_nationality;
                            $scope.owner_physical_address = vehicle[0].owner_physical_address;
                            $scope.owner_address = vehicle[0].owner_address;
                            $scope.make = vehicle[0].make;
                            $scope.type = vehicle[0].type;
                            $scope.color = vehicle[0].color;
                            $scope.yom = vehicle[0].yom;
                            $scope.chasis_no = vehicle[0].chasis_no;

                        }).error(function(error) {
                            console.log(error);
                        });

                }).error(function(error) {
                    console.log(error);
                });



        }]);