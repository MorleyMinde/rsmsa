angular.module('offenceApp').controller('offenceListController',function($scope,$http,$routeParams) {
		$scope.offenceList = {};
		if($routeParams.id){
			$http.get("/api/offence/registry/"+$routeParams.id+"/offences").success(function(data) {
				$scope.offenceList = data;
			});
		}else
		{
			$http.get("/api/offences").success(function(data) {
				$scope.offenceList = data;
			});
		}
		
		//Delete offence
		$scope.deleteOffence = function(offence){
			if(confirm("Are you sure you want to delete this offence"))
			{
				//Delete offence from the server
				$http.get("/api/offence/"+offence.id+"/delete/").success(function(data){
					//Remove the deleted offence from the offenceList Model.
					for(i = 0;i < $scope.offenceList.length;i++)
					{
						if($scope.offenceList[0].id = offence.id)
						{
							$scope.offenceList.splice(i,1);
							break;
						}
					}
					
				}).error(function(error) {
					alert("hey");
				});
			}
			
		};
});