/**
 * Offence registry controller to show all the registry and enable viewing of their corresponding offences
 * 
 * @author Vincent P. Minde
 * 
 */
angular.module('rsmsaApp').controller('offenceRegController',function($scope,$http,$mdDialog) {
		//Initialize offence registry
		$scope.offenceRegs = {};
		//Fetch offence registry
		$http.get("/api/offence/registry").success(function(data) {
			$scope.offenceRegs = data;
			
		}).error(function(error) {
			//TODO Handle Error
		});
		$scope.editRegistry = function(ev){
			//Show dialog box with a list of offences to choose from
			$mdDialog.show({
				controller : RegistryFormDialogController,
				templateUrl : 'views/registryFormDialog.html',
				targetEvent : ev,
			});
		}
});
/**
 * Dialog box to select offences from list of offences
 */
function RegistryFormDialogController($scope, $mdDialog,$http) {
	$scope.registry = {
			nature:"",
			section:"",
			relating:"",
			amount:""
	}; 
	//Hide the dialog box
	$scope.hide = function() {
		$mdDialog.hide();
	};
	//Hide the dialog box
	$scope.save = function() {
		$mdDialog.hide();
	};
}