<!DOCTYPE html>
<html ng-app="rsmsaApp">
<head>

<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="../angular-material/angular-material.css">

<!-- Angular Material Dependencies -->
<script src="angular/angular.min.js"></script>
<script src="hammerjs/hammer.min.js"></script>
<script src="angular-animate/angular-animate.min.js"></script>
<script src="angular-aria/angular-aria.min.js"></script>
<script src="angular/angular-messages.min.js"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
<script src="angular-material/angular-material.min.js"></script>
<script src="angular-material/angular-text.min.js"></script>
<link rel="stylesheet" href="angular-material/angular-text.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<style>
md-card{
	background-color:#3F51B5;
	padding:0;
	height:300px;
	margin:0.66%;
	cursor:pointer;
}
md-card:hover{
	box-shadow:0px 0px 5px #888888;
}
md-card-content{
	background-color:#1A237E;
	color:white;
}
md-card .img{
	width: 70%;
	height: 200px;
	margin:auto;
	border-radius:50%;
	background-repeat: no-repeat;
background-position: center;
background-size: 40%;
}
md-card{
	width:24%;
}
md-card:nth-child(4n - 3){
    width:48%;
}


</style>
<script>
angular.module('rsmsaApp', ['ngMaterial'])
.controller('AppCtrl', function($scope, $http, $mdDialog) {
	$scope.apps = {};
	//Gets manifests of all files registered
	$http.get("/apps/manifests").success(function(data) {
		$scope.apps = data;
	}).error(function(error) {
		alert(error);
		$scope.data.error = error;
	});
	//Open the app with a dialog animation
	$scope.openApp = function(ev,appId){
		
		$mdDialog.appId = appId;
		$mdDialog.show({
		      controller: DialogController,
		      templateUrl: '/views/app.html',
		      targetEvent: ev,
		    })
		    .then(function(answer) {
		      $scope.alert = 'You said the information was "' + answer + '".';
		    }, function() {
		      $scope.alert = 'You cancelled the dialog.';
		    });
	}
});
function DialogController($scope, $mdDialog) {
	$scope.getIframeSrc = function () {
		  return '/app/' + $mdDialog.appId +"/";
	};
	  $scope.hide = function() {
	    $mdDialog.hide();
	  };
	  $scope.cancel = function() {
	    $mdDialog.cancel();
	  };
	  $scope.back = function() {
	    $mdDialog.hide();
	  };
	}
</script>
<body>
<div ng-controller="AppCtrl" style="height:100%">
  <md-content style="height:100%;background: url(img/background.jpg);background-size: cover;background-repeat: no-repeat;">
    <md-toolbar class="md-tall md-warn md-hue-3" style="background-color: #8BC34A  !important">
    <div layout="row" style="height: 100%">
    	<div style="width:12.5%">
    	</div>
    	<div style="width:75%">
    		<h2 class="md-toolbar-tools" style="padding-top: 60px;;font-size:20px;color:white">
        		ROAD SAFETY MANAGEMENT SYSTEM.
      		</h2>
    	</div>
    	<div style="width:12.5%">
    		<div style="margin: auto;margin-top: 10px;width:100px;height:100px;border-radius:50%;border:1px solid blue">
      </div>
    	</div>
    </div>
      
      
    </md-toolbar>
    <div layout="row" layout-wrap style="margin:auto;width:75%;">

  	<md-card ng-repeat="app in apps" ng-click="openApp($event,app.id)" style="background-color:{{app.color.c200}}">
	 	<div class="img" style="background-image:url(app/{{app.id}}/{{app.icons.small}})">
	 		
	 	</div>
	      
	      <md-card-content style="background-color:{{app.color.c500}}">
	        {{app.name}}
	      </md-card-content>
	</md-card>

    </div>
</body>
</html>