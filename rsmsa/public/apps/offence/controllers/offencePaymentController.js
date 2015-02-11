angular.module('offenceApp').controller('offencePaymentController',function($scope,$http) {
	
	//Initialize entity Model
	$scope.entity = { id: 'driver', name: 'Driver' , ref :'License No.'};
	//Initialize entities for the listbox
	$scope.entities = [
		                 { id: 'driver', name: 'Driver' , ref :'License No.'},
		                 { id: 'vehicle', name: 'Vehicle' , ref :'Plate No.'}
		               ];
	//Initialize status Model 'Stores whether it is paid or not paid status
	$scope.status = { id: '', name: 'All'};
	//Initialize statuses for the listbox
	$scope.statuses = [
		                 { id: '', name: 'All'},
		                 { id: 'paid', name: 'Paid'},
		                 { id: 'notpaid', name: 'Not Paid'}
		               ];
	//Initialize request which stores the id for the request to be done
	//"id" can hold the license number or vehicle plate number
	$scope.request = {
				"id" : ""
			};
		//Initialize offence list
		$scope.offences = [];
		
		//Get offence from server
		$scope.getOffence = function(){
			if($scope.request.id != "")//If request id is not empty
			{
				//Initialize url for the request
				var url = "/api/"+$scope.entity.id+"/"+$scope.request.id+"/offences";
				if($scope.status.id != '')//If status id is not empty
				{
					//Append the url with the status
					url = url +'/' + $scope.status.id;
				}
				//Fetch offences from server
				$http.get(url).success(function(data){
					//set offences
					$scope.offences = data.offences;
				}).error(function(error) {
					//alert(error);
					//TODO Handle error
				});
			}
		}
		/**
		 * Get status string
		 * 
		 * @param boolean paid
		 */
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