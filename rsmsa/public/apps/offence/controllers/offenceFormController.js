angular.module('offenceApp').controller('offenceFormController',function($scope,$http, $mdDialog
		,$rootScope, $scope, $routeParams, $route) {
	$scope.isreadonly = false;
	//Offence  mirrored as in the database
	$scope.offence = {
			"to" : "",
			"address" : "",
			"offences" : [],
			"place" : "",
			"facta" : "",
			"factb" : "",
			"factc" : "",
			"factd" : "",
			"station" : "",
			"commit":"",
			"amount":"",
			"offence_date" : "",
			"vehicle_plate_number":"",
			"driver_license_number":"",
			"rank_no":""
		};
	//Stores the offence events of an offence
	$scope.offenceEvents = [];
	if($routeParams.request){
		if($routeParams.request == "view" || $routeParams.request == "edit")// if the route is /view or /edit
		{
			//Fetch the offence involved
			$http.get("/api/offence/"+$routeParams.id).success(function(data){
				//data.offence_date = convertDateToClient(data.offence_date);
				$scope.offence = data;
			}).error(function(error) {
				alert(error);
			});
			//Fetch the events of the offence involved
			$http.get("/api/offence/"+$routeParams.id+"/events/").success(
					function(data) {
						$scope.offenceEvents = data;
					}).error(function(error) {
				alert(error);
				$scope.data.error = error;
			});
		}
	}else
	{
		//This is when the use is reporting a new offence
		//alert("Not request");
	};
	$scope.data = {};
	//$scope.data.offenceRegistry = [];
	
	//Stores the offeces selected from the dialogbox
	$scope.data.selectedOffence = [];
	
	//Driver  as in the database
	$scope.driver ={};
	//Watch for changes on the license number
	$scope.$watch('offence.driver_license_number', function (newValue, oldValue) {
		if(newValue != '')
		{
			//Fetch driver from the server
			$http.get("/api/driver/" + newValue)
				.success(
					function(data) {
						$scope.driver = data;
						$scope.offence.to = data.first_name +" "+ data.last_name;
						$scope.offence.address = data.address;
					})
				.error(function(error) {
					alert("Err:"+error);
					$scope.data.error = error;
				});
		}
    });
	//Vehicle  mirrors the one on the database
	$scope.vehicle ={};
	//Fetches vehicle information given the plate number
	$scope.$watch('offence.vehicle_plate_number', function (newValue, oldValue) {
		if(newValue != '')
		{
			$http.get("/api/vehicle/" + newValue)
				.success(
					function(data) {
						$scope.vehicle = data;
					})
				.error(function(error) {
					alert("Err:"+error);
					$scope.data.error = error;
				});
		}
    });
	//fetch police information given the rank
	$scope.police = {};
	$scope.$watch('offence.rank_no', function (newValue, oldValue) {
		
		if(newValue != '')
		{
			$http.get("/api/police/" + newValue).success(
					function(data) {
						$scope.police = data;
					}).error(function(error) {
				alert(error);
				$scope.data.error = error;
			});
		}
	});
	$scope.station = {};
	$scope.$watch('police.station_id', function (newValue, oldValue) {
		
		if(newValue != '')
		{
			$http.get("/api/station/" + newValue).success(
					function(data) {
						$scope.station = data;
					}).error(function(error) {
				alert(error);
				$scope.data.error = error;
			});
		}
	});
	//submit the offence object to the server
	$scope.submitOffence = function() {
		/*$http.post("/api/offence/","{'offence':"+$scope.offence+",'events':"+$scope.offenceEvents+"}").success(function(data){
			alert("Task added."+data);
		}).error(function(error) {
			alert(error.type);
		});*/
		$http({
		    url: '/api/offence/',
		    method: "POST",
		    data: {'offence':$scope.offence,'events':$scope.offenceEvents}
		})
		.then(function(response) {
			alert("Task added."+response);
		    }, 
		    function(response) { // optional
		    	alert(response[0]);
		    }
		);
	}
	//Show a dialog box of offence registry
	$scope.showOffences = function(ev) {
		$mdDialog.selectedOffence = $scope.selectedOffence;
		$mdDialog.push = function(offenceEvent){
			$scope.offenceEvents.push(angular.copy(offenceEvent));
		};
		$mdDialog.show({
			controller : DialogController,
			templateUrl : 'views/offencelistdialog.html',
			targetEvent : ev,
		});
	};
});
/*function convertDateToClient(date){
	var newdate = "";
	alert(date);
	newdate[0] = date[5];
	newdate[1] = date[6];
	newdate[3] = '/';
	newdate[4] = date[8];
	newdate[5] = date[9];
	newdate[6] = '/';
	newdate[7] = date[0];
	newdate[8] = date[1];
	newdate[9] = date[2];
	newdate[0] = date[3];
	return newDate
}*/
function DialogController($scope, $mdDialog,$http) {
	$scope.offenceRegistry = [];
	//Hide the dialog box
	$scope.hide = function() {
		$mdDialog.hide();
	};
	//Push the check offence to the offence form
	$scope.checkClick = function(offenceEvent) {
		$mdDialog.push(offenceEvent);
	}
	//fetch Offence registry list
	$http.get("/api/offence/registry").success(function(data) {
		$scope.offenceRegistry = data;
		for(i = 0; i < $scope.offenceRegistry.length;i++)
		{
			//$scope.offenceRegistry
		}
	}).error(function(error) {
		alert(error);
		$scope.data.error = error;
	});
}