angular.module('offenceApp', [ 'ngMaterial' ]).constant("dataUrl",
		"/offenceregistry").controller(
		'offenceCtrl',
		function($scope, $mdDialog, $http, dataUrl) {
			alert("kiur");
			$scope.data = {};
			$scope.data.selectedOffence = [];
			//Offence 
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
			//driver object
			$scope.driver = {
				license_number:""
			}
			//vehicle object
			$scope.vehicle = {
				regNo : "",
				make : "",
				type : ""
			};
			//police object
			$scope.police = {
				rank : "",
				station : ""
			};
			//Fetch offence registry information
			$http.get(dataUrl).success(function(data) {
				$scope.data.offenceRegistry = data;
				for(var i = 0; i < $scope.data.offenceRegistry.length; i++)
				{
					$scope.data.selectedOffence[$scope.data.offenceRegistry[i].section] = false;
				}
			}).error(function(error) {
				alert(error);
				$scope.data.error = error;
			});
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
			//Fetches vehicle information given the plate number
			$scope.getVehicle = function() {
				$http.get("/model/vehicle/" + $scope.vehicle.regNo).success(
						function(data) {
							// alert(data[0].make);
							if (data.length > 0) {
								$scope.vehicle.make = data[0].make;
								$scope.vehicle.type = data[0].type;
							} else {
								$scope.vehicle.make = "";
								$scope.vehicle.type = "";
							}

						}).error(function(error) {
					alert("Err:"+error);
					$scope.data.error = error;
				});
			}
			//fetch police information given the rank
			$scope.getPolice = function() {
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
					templateUrl : 'offencelistdialog.html',
					targetEvent : ev,
				});
			};
		});
function DialogController($scope, $mdDialog) {
	$scope.hide = function() {
		$mdDialog.hide();
	};
	$scope.checkClick = function(sec) {
		$mdDialog.push(sec);
		//$scope.offence.offences.push(sec);
		//alert($scope.data.selectedOffence.length);
	}
}