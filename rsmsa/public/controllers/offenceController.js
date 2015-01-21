angular.module('offenceApp', [ 'ngMaterial' ]).constant("dataUrl",
		"/offenceregistry").controller(
		'offenceCtrl',
		function($scope, $mdDialog, $http, dataUrl) {
			$scope.data = {};
			$scope.data.selectedOffence = [ "her" ];
			$scope.offence = {
				name : "Mmmh",
				address : "Address",
				offences : [],
				place : "",
				facts : {
					a : "",
					b : "",
					c : "",
					d : ""
				},
				station : "",
				a : {
					name : "",
					residence : "",
					charges : [],
					notification : ""
				},
				b : {
					name : "",
					residence : "",
					charges : [],
					amount : ""
				},
				date : ""
			};
			$scope.vehicle = {
				regNo : "",
				make : "",
				type : ""
			};
			$scope.police = {
				rank : "",
				station : ""
			};
			$http.get(dataUrl).success(function(data) {
				$scope.data.offenceRegistry = data;
			}).error(function(error) {
				alert(error);
				$scope.data.error = error;
			});
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
					alert(error);
					$scope.data.error = error;
				});
			}
			$scope.checkClick = function(sec) {
				$scope.offence.offences.push(sec);
				alert($scope.data.selectedOffence.length);
			}
			$scope.push = function(section) {
				$scope.data.selectedOffence.push(section);
			}
			$scope.submitOffence = function() {
				alert($scope.offence.b.charges);
			}
			$scope.showOffences = function(ev) {
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
}