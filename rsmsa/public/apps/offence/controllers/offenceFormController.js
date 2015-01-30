angular.module('offenceApp').controller('offenceFormController',function($scope,$http, $mdDialog
		,$rootScope, $scope, $routeParams, $route) {
	$scope.isreadonly = false;
	$scope.offence = {
			"name" : "",
			"to" : "",
			"address" : "",
			"offences" : [],
			"place" : "",
			"facts" : {
				"a" : "",
				"b" : "",
				"c" : "",
				"d" : ""
			},
			"station" : "",
			"a" : {
				"name" : "",
				"residence" : "",
				"charges" : [],
				"notification" : ""
			},
			"b" : {
				"name" : "",
				"residence" : "",
				"charges" : [],
				"amount" : ""
			},
			"date" : "",
			"vehicle_plate_number":"",
			"driver_license_number":"",
			"rank_no":""
		};
	if($routeParams.request){
		//alert("view or edit");
		if($routeParams.request == "view")
		{
			$http.get("/api/offence/"+$routeParams.id).success(function(data){
				$scope.offence = data;
			}).error(function(error) {
				alert(error);
			});
		}
	}else
	{
		//alert("Not request");
	};
	$scope.isReadOnly = function(elem){
		alert("here");
		elem.readOnly = $scope.isreadonly;
	};
	$scope.data = {};
	//$scope.data.offenceRegistry = [];
	$scope.data.selectedOffence = [];
	//Offence 
	
	//driver object
	$scope.driver = {
		license_number:""
	}
	//vehicle object
	/*$scope.vehicle = {
		regNo : "",
		make : "",
		type : ""
	};*/
	//police object
	$scope.police = {
		rank : "",
		station : ""
	};
	$scope.viewOffence = function(val){
		alert(val);
	}
	//Fetch offence registry information
	
	//Fetch driver infromation given the license number
	$scope.getDriver = function() {
		$http.get("/model/driver/" + $scope.driver.license_number)
		.success(
				function(data) {
					if (data.length > 0) {
						$scope.offence.name = data[0].first_name + " " + data[0].last_name;
						$scope.offence.to = $scope.offence.name + " (" +data[0].phone_number +")";
						$scope.offence.address = data[0].address;
					} else {
						$scope.vehicle.make = "";
						$scope.vehicle.type = "";
					}

				}).error(function(error) {
			alert("Err:"+error);
			$scope.data.error = error;
		});
	}
	$scope.vehicle ={};
	//Fetches vehicle information given the plate number
	$scope.$watch('offence.rank_no', function (newValue, oldValue) {
		
		if(newValue != '')
		{
			alert(newValue);
			$http.get("/model/vehicle/" + newValue)
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
$scope.$watch('offence.vehicle_plate_number', function (newValue, oldValue) {
		
		if(newValue != '')
		{
			$http.get("/model/police/" + $scope.police.rank).success(
					function(data) {
						// alert(data[0].make);
						if (data.length > 0) {
							$scope.police.station = data[1].name;
						} else {
							$scope.police.station = "";
						}
						
					}).error(function(error) {
				alert(error);
				$scope.data.error = error;
			});
		}
	});
	//submit the offence object to the server
	$scope.submitOffence = function() {
		$http.post("/api/offence/",$scope.offence).success(function(data){
			alert("Task added."+data);
		}).error(function(error) {
			alert(error);
		});
	}
	//Show a dialog box of offence registry
	$scope.showOffences = function(ev) {
		for(var i = 0; i < $scope.offence.offences.length; i++)
		{
			$scope.data.selectedOffence[$scope.offence.offences[i]] = true;
		}
		$mdDialog.push = function(sec){
			$scope.offence.offences.push(angular.copy(sec));
		};
		$mdDialog.show({
			controller : DialogController,
			templateUrl : 'views/offencelistdialog.html',
			targetEvent : ev,
		});
	};
});
function DialogController($scope, $mdDialog,$http) {
	$scope.offenceRegistry = [];
	//Hide the dialog box
	$scope.hide = function() {
		$mdDialog.hide();
	};
	//Push the check offence to the offence form
	$scope.checkClick = function(sec) {
		$mdDialog.push(sec);
	}
	//fetch Offence registry list
	$http.get("/api/offenceregistry").success(function(data) {
		$scope.offenceRegistry = data;
	}).error(function(error) {
		alert(error);
		$scope.data.error = error;
	});
}