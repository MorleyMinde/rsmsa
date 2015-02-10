var routProvider = null;
angular.module('offenceApp', [ 'ngMaterial' , "ngRoute",'ui.date'])
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
						/*var fileref=document.createElement('script')
						  fileref.setAttribute("type","text/javascript")
						  fileref.setAttribute("src", 'controllers/'+route.controller+'.js')
						//alert(route.controller);*/
						if(!(route.controller == undefined))
						{
							$scope.appControllers.push(route.controller);
						}
							
					}
					//alert("Root:"+$routeParams.path());
					routeProvider.otherwise({redirectTo: $scope.app.defaultRoute});
					if($location.path() == '')
					{
						$location.path($scope.app.defaultRoute);
					}else
					{
						$location.path($location.path());
					}
					
				}).error(function(error) {
					alert(error);
					$scope.data.error = error;
				});
		});