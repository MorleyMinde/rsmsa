angular.module('offenceApp').controller('offenceReportController',function($scope,$http) {
		$scope.results = null;
		$scope.tableReport = function(){
			$http.get("/api/offence/report").success(function(data){
				//data.offence_date = convertDateToClient(data.offence_date);
				$scope.results = data;
			}).error(function(error) {
				alert(error);
			});
		}
});