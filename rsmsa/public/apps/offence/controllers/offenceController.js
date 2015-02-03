var routProvider = null;
angular.module('offenceApp', [ 'ngMaterial' , "ngRoute"])
	.config(function ($routeProvider) {
			routeProvider = $routeProvider;
		})
	.controller('offenceCtrl',function($scope, $mdDialog, $http,$mdSidenav, $location) {
			$scope.toggleLeft = function() {
			    $mdSidenav('left').toggle();
			  };
			  $scope.appControllers = [];
			  $scope.getContollerUrl =function(controller){
				  return "controllers/"+controller+".js";
			  }
			  $scope.closeNav = function() {
				    $mdSidenav('left').close();
				  };
			  $scope.app = {};
			  $http.get("manifest").success(function(app) {
					$scope.app = app;
					//alert(app.routes);
					//Loop through the routes and define
					for(var i = 0;i < app.routes.length;i++)
					{
						var route = app.routes[i];
						routeProvider.when(route.route, {
							templateUrl: "views"+route.view,
							//controller:"offenceListController"
							//resolve: resolveController('controllers/'+route.controller+'.js')
						});
						//alert(route.controller);
						if(!(route.controller == undefined))
						{
							$scope.appControllers.push(route.controller);
						}
							
					}
					routeProvider.otherwise({redirectTo: $scope.app.defaultRoute});
					$location.path($scope.app.defaultRoute);
				}).error(function(error) {
					alert(error);
					$scope.data.error = error;
				});
		});