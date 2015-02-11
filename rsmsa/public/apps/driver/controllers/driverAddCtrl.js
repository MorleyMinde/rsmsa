/**
 * Created by kelvin on 2/10/15.
 */
angular.module('rsmsaApp')
    .controller('driverAddCtrl',function($scope,$http){
        $scope.data = {};
        $scope.currentKaya = {};
        $scope.currentKaya.countries = "Tanzania"
        $http.get('../../countries').success(function(data){
            $scope.data.countries = data;
        });

        $scope.dateOptions = {
            changeYear: true,
            changeMonth: true,
            dateFormat: 'mm-dd-yy'
        };
    });