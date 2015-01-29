angular.module('offenceApp').controller('offenceListController',function($scope,$http) {
		$scope.offenceList = {};
		$http.get("/api/offences").success(function(data) {
			$scope.offenceList = data;
		});
});