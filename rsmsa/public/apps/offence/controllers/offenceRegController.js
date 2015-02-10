angular.module('offenceApp').controller('offenceRegController',function($scope,$http) {
		$scope.offenceRegs = {};
		//Fetch offence registry
		$http.get("/api/offence/registry").success(function(data) {
			$scope.offenceRegs = data;
			
		}).error(function(error) {
			alert(error);
			$scope.data.error = error;
		});
});