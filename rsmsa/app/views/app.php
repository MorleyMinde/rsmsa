<!DOCTYPE html>
<html ng-app="rsmsaApp">
<head>

<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="/angular-material/angular-material.css">

<!-- Angular Material Dependencies -->
<script src="/angular/angular.min.js"></script>
<script src="/hammerjs/hammer.min.js"></script>
<script src="/angular-animate/angular-animate.min.js"></script>
<script src="/angular-aria/angular-aria.min.js"></script>
<script src="/angular/angular-messages.min.js"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
<script src="/angular-material/angular-material.min.js"></script>
<script src="/angular-material/angular-text.min.js"></script>
<script src="/angular/angular-route.min.js"></script>
<link rel="stylesheet"
	href="/angular-material/angular-text.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<style>
.container {
	position: fixed;
	top: 0;
	left: 0;
	z-index: 0;
	background: url(/img/background.jpg);
	height: 100%;
	width: 100%;
}
.container > md-content > md-toobar{
	background-color: #8BC34A !important;
}
.main {
	position: absolute;
	width: 75%;
	background-color: white;
	height: 1000px;
	left: 12.5%;
	top: 20px;
	overflow: hidden;
}

md-card, .content {
	padding: 0;
}

md-toolbar {
	padding:8px;
}
.menu-button{
	width:56px;
	height:56px;
	border-radius:50% !important;
}
.sub-menu-button{
	width:100%;
	height: 40px;
	text-align: left;
	padding-left: 20px;
	text-transform: none;
}
md-icon{
	margin-top:0;
}
</style>
<script>
var mainModule = angular.module('rsmsaApp', ['ngMaterial', "ngRoute"])/*.config(function ($routeProvider) {
	$routeProvider.when("/home", {
		templateUrl: "views/offenclistdialog.html"
		});
})*/;
mainModule.controller('AppCtrl', function($scope, $http, $mdSidenav, $log,$route) {
	//configure route at runtime not working
	 $route.routes['/home'] = {templateUrl: 'views/offencelistdialog.html'};
	 //alert($route.routes['/home'].templateUrl);
	 //When menu button is clicked show the left menu
  $scope.toggleLeft = function() {
    $mdSidenav('left').toggle();
  };
  $scope.app = {};
 
  /*mainModule.config(function ($routeProvider) {
		alert("configuring");
		for (i = 0; i < app.routes.length; i++) { 
		    alert(app.routes[i].route);
		}
	});*/
	//Gets the manifest file for the app
  $http.get("manifest").success(function(app) {
		$scope.app = app;
		//alert(app.routes);
		
		
		/*$routeProvider.when("/checkout", {
			templateUrl: "/views/checkoutSummary.html"
			});*/
	}).error(function(error) {
		alert(error);
		$scope.data.error = error;
	});
});

</script>
<body style="">
	<div class="container">
		<md-content> <md-toolbar class="md-tall md-warn md-hue-3" style="background-color: {{app.color.c500}}  !important"> </md-toolbar>
		
		</md-content>
	</div>
	<md-card class="main" ng-controller="AppCtrl"> 
	<md-card-content class="content">
	<section layout="row" flex>
		<md-sidenav class="md-sidenav-left md-whiteframe-z2"
			md-component-id="left"> 
			<md-toolbar class="md-theme-light" style="background-color:{{app.color.c200}} !important">
				<h1 class="md-toolbar-tools">Menu</h1>
			</md-toolbar> 
			<md-list>
				<md-item ng-repeat="route in app.routes">
					<md-item-content>
					<a href="#{{route.route}}" style="width:100%"><md-button class="sub-menu-button">{{route.name}}</md-button></a>
					</md-item-content>
				</md-item>				
			</md-list>
		</md-sidenav>
		<md-toolbar style="background-color:{{app.color.c200}} !important">
			<div layout="row" >
				<div flex>
					<md-button class="menu-button" aria-label="Profile" ng-click="toggleLeft()"> <md-icon
						icon="/img/navigation/2x_web/ic_menu_black_48dp.png"
						style="width: 24px; height: 24px;"></md-icon> </md-button>
				</div>
				<div flex>
					<h2 class="md-toolbar-tools">
						<span>{{app.name}}</span>
					</h2>
				</div>
			</div>
		</md-toolbar>
	</section>
	<ng-view />
	</md-card-content> </md-card>
</body>
</html>
