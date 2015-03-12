/**
 * Offence Controller Definition
 * 
 * TODO Should be changed to the app main controller for all apps
 */
//Variable to store the angular routeProvide in order to use it outside the config function
var routProvider = null;
angular.module('rsmsaApp', [ 'ngMaterial' , "ngRoute",'ui.date',"highcharts-ng"])
	.config(function ($routeProvider) {
			routeProvider = $routeProvider;
		})
	.controller('rsmsaAppController',function($scope, $mdDialog, $http,$mdSidenav, $location) {
			
			//Shows the left menu
			$scope.toggleLeft = function() {
			    $mdSidenav('left').toggle();
			  };
			//Hides the left menu
			  $scope.closeNav = function() {
				    $mdSidenav('left').close();
			  };
			  //List of app controllers
			  $scope.appControllers = [];
			  //Gets the controller javascript file string
			  $scope.getContollerUrl =function(controller){
				  return "controllers/"+controller+".js";
			  }
			  
			  //App Model
			  $scope.app = {};
			  //Fetches the app manifest file content
			  $http.get("manifest").success(function(app) {
					$scope.app = app;
					//Loop through the routes and define the routes
					for(var i = 0;i < app.routes.length;i++)
					{
						var route = app.routes[i];
						routeProvider.when(route.route, {
							templateUrl: "views"+route.view,
							controller:route.controller
							//TODO Resolve controllers with respect to views
							
						});
						//TODO Load javscript file for a given controller
						if(!(route.controller == undefined))
						{
							//Push to the controller to app controllers
							$scope.appControllers.push(route.controller);
						}
							
					}
					routeProvider.otherwise({redirectTo: $scope.app.defaultRoute});
					if($location.path() == '')//If no path/route provided load the default route else load the path
					{
						$location.path($scope.app.defaultRoute);
					}else
					{
						
						$location.path($location.path());
					}
					
				}).error(function(error) {
					//TODO Handle error in loading manifest
					$scope.data.error = error;
				});
		});
