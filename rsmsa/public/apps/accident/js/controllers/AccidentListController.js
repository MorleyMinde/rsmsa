/**
 * Created by PAUL on 2/5/2015.
 */
angular.module('offenceApp').controller('offenceListController',function($scope,$http) {
    $scope.offenceList = {};
    $http.get("/api/offences").success(function(data) {
        $scope.offenceList = data;
    });
})