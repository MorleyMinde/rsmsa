/**
 * Created by kelvin on 1/29/15.
 */
angular.module('rsmsaApp')
    .controller('driverAppCtrl',function($scope,$http){
        $scope.data = {};
        $http.get('../../drivers').success(function(data){
           $scope.data.drivers = data;
        });
    });