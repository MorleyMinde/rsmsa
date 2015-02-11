/**
 * Created by PAUL on 2/10/2015.
 */
angular.module('accidentApp')
    .controller('AccidentReportController' , function($scope,$http){

        $scope.selected_region = {

            "id" : "",
            "name" : ""
        }

        $http.get('/api/regions')
            .success(function(data){
                $scope.regions = data;
                console.log(data[0]);
            })
            .error(function(error) {
                console.log(error);
            });

        $scope.getDistrict = function(){
            $http.get('/accident/region/' + $scope.selected_region.name)
                .success(function(data){
                    $scope.districts = data;
                    console.log(data);
                }).error(function(error) {
                    console.log(error);
                });
        }
    }
);