angular.module('offenceApp').controller('offenceListController',function($scope,$http) {
		$scope.offenceList = {};
		$http.get("/api/offences").success(function(data) {
			$scope.offenceList = data;
		});
		$scope.deleteOffence = function(offence){
			if(confirm("Are you sure you want to delete this offence"))
			{
				$http.get("/api/offence/"+offence.id+"/delete/").success(function(data){
					//alert("Object:"+offence);
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