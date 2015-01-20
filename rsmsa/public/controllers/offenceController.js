angular
		.module('offenceApp', [ 'ngMaterial' ])
		.constant("dataUrl", "/offenceregistry")
		.controller(
				'offenceCtrl',
				function($scope, $mdDialog,$http,dataUrl) {
					$scope.offence = {
						name : "Mmmh",
						address : "Address",
						offences:["her","34"]
					};
					$http.get(dataUrl)
						.success(function (data) {
							$scope.data = data;
						})
						.error(function (error) {
							alert(error);
							$scope.data.error = error;
						});
					$scope.showOffences = function(ev) {
						$mdDialog
								.show({
									controller : DialogController,
									templateUrl : 'offencelistdialog.html',
									targetEvent : ev,
								})
								.then(
										function(answer) {
											$scope.alert = 'You said the information was "'
													+ answer + '".';
										},
										function() {
											$scope.alert = 'You cancelled the dialog.';
										});
					};
				});
function DialogController($scope, $mdDialog) {
	$scope.hide = function() {
		$mdDialog.hide();
	};
	$scope.cancel = function() {
		$mdDialog.cancel();
	};
	$scope.answer = function(answer) {
		$mdDialog.hide(answer);
	};
	$scope.checkClick = function(val,section){
		if(val.value)
		{
			alert(section);
		}
		
	}
}