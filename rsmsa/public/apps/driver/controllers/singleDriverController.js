/**
 * Created by kelvin on 3/12/15.
 */
angular.module('rsmsaApp')
    .controller('singleDriverController',
        function($scope, $routeParams ,$http) {
            $scope.driver = {};
            if($routeParams.id){//If there is an id on the route
                //Fetch
                $http.get("/driver/"+$routeParams.id).success(function(data) {
                    $scope.driver = data;
                    //getting offences
                    $http.get("/api/driver/"+data.license_number+"/offences").success(function(data1) {
                        $scope.driver.offences = data1;
                    });
                    //getting license renewal information
                    //$http.get("/driver/"+$routeParams.id).success(function(data) {
                     //   $scope.driver = data;
                    //});

                    //getting accidents inforamation
                    $http.get("/api/accidents/driver/"+data.license_number).success(function(data2) {
                        $scope.driver.accidents = data2;
                    });
                });
            }
        });