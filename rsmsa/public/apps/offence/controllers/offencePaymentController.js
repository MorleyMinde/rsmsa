angular.module('offenceApp').controller('offencePaymentController',function($scope,$http) { 
	$scope.entity = { id: 'driver', name: 'Driver' , ref :'License No.'};
	$scope.entities = [
		                 { id: 'driver', name: 'Driver' , ref :'License No.'},
		                 { id: 'vehicle', name: 'Vehicle' , ref :'Plate No.'}
		               ];
	$scope.status = { id: 'all', name: 'All'};
	$scope.statuses = [
		                 { id: '', name: 'All'},
		                 { id: 'paid', name: 'Paid'},
		                 { id: 'notpaid', name: 'Not Paid'}
		               ];
	$scope.request = {
				"id" : ""
			};
		 
		$scope.offences = [];
		$scope.getOffence = function(){
			if($scope.request.id != "")
			{
				var url = "/api/"+$scope.entity.id+"/"+$scope.request.id+"/offences";
				if($scope.status.id != '')
				{
					url = url +'/' + $scope.status.id;
				}
				$http.get(url).success(function(data){
					//data.offence_date = convertDateToClient(data.offence_date);
					$scope.offences = data;
				}).error(function(error) {
					alert(error);
				});
			}
		}
		$scope.getStatus = function(paid){
			//alert("Status:"+status);
			if(paid)
			{
				return "Paid";
			}else
			{
				return "Not Paid";
			}
		};
});