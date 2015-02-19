<!DOCTYPE html>
<html ng-app="insuranceApp"  ng-controller="AppCtrl">
<head>

<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="<?php echo asset('angular-material/angular-material.css')?>">

<!-- Angular Material Dependencies -->

<script src="<?php echo asset('js/jquery/jquery.js')?>"></script>
<script src="<?php echo asset('js/jquery/jquery-ui.js')?>"></script>
<script src="<?php echo asset('angular/angular.min.js')?>"></script>
    <script src="<?php echo asset('DataTables/media/js/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo asset('angular-datatables/dist/angular-datatables.js') ?>"></script>
<script src="<?php echo asset('angular-animate/angular-animate.min.js')?>"></script>
<script src="<?php echo asset('angular-aria/angular-aria.min.js')?>"></script>
<script src="<?php echo asset('angular/angular-messages.min.js')?>"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
<script src="<?php echo asset('angular-material/angular-material.min.js')?>"></script>
<script src="<?php echo asset('angular-material/angular-text.min.js')?>"></script>
<script src="<?php echo asset('angular/angular-route.min.js')?>"></script>
    <script src="<?php echo asset('highcharts-ng/src/highcharts-custom.js') ?>"></script>
<script src="<?php echo asset('js/highcharts-ng.js')?>"></script>
<script src="<?php echo asset('angular/ui-date/date.js')?>"></script>
    <script src="<?php echo asset('js/angular-file-upload.min.js')?>"></script>


    <!-- Angular Material Dependencies -->

<link rel="stylesheet" href="<?php echo asset('js/jquery/jquery-ui.min.css')?>">
<link rel="stylesheet" href="<?php echo asset('angular-material/angular-text.min.css')?>">
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>">
<link rel="stylesheet" href="<?php echo asset('apps/accident/css/bootstrap.css')?>"/>
<link rel="stylesheet" href="<?php echo asset('apps/accident/css/bootstrap-theme.css')?>"/>
<link rel="stylesheet" href="<?php echo asset('apps/accident/css/material-design.css')?>"/>
<link href="<?php echo asset('DataTables/media/css/jquery.dataTables.css') ?>" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo asset('apps/accident/css/font-awesome/css/font-awesome.min.css')?>" />

<style>
.container {
	position: fixed;
	top: 0;
	left: 0;
	z-index: 0;
	background: url('/img/background.jpg');
	height: 100%;
	width: 100%;
}
.container > md-content > md-toobar{
	background-color: #8BC34A !important;
}
.main {
	position: absolute;
	width: 75%;
    min-height: 800px;
	background-color: white;
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
<script ng-repeat="app in app.routes" ng-src="{{getControllerSrc(app.controller)}}"></script>
<script>
var routeProvider = null;

var mainModule = angular.module('insuranceApp', ['ngMaterial', "ngRoute","ui.date","datatables","angularFileUpload"]).config(function ($routeProvider) {

	routeProvider = $routeProvider;
});

mainModule.controller('AppCtrl', function($scope, $http, $mdSidenav, $log,$route) {
	 //When menu button is clicked show the left menu
  $scope.toggleLeft = function() {
    $mdSidenav('left').toggle();
  };
  $scope.app = {};


    $scope.closeNav = function() {
        $mdSidenav('left').close();
    };

});
</script>

    <script src="<?php echo asset('apps/insurance/routes.js')?>"></script>
    <script src="<?php echo asset('apps/insurance/js/InsuranceAppCtrl.js')?>"></script>

</head>

<body>

	<div class="container">
		<md-content> <md-toolbar class="md-tall md-warn md-hue-3" style="background-color:#308014 !important"> </md-toolbar>

		</md-content>
	</div>
	<md-card class="main">
	<md-card-content class="content">
	<section layout="row" flex>
		<md-sidenav class="md-sidenav-left md-whiteframe-z2"
			md-component-id="left">
			<md-toolbar class="md-theme-light" style="background-color:#7CFC00 !important">
				<h1 class="md-toolbar-tools">Menu</h1>
			</md-toolbar>
			<md-list>
			<!-- Menu buttons -->
				<md-item>
					<md-item-content>
					<a href="#/home" style="width:100%;font-size:14px"><md-button class="sub-menu-button" ng-click="closeNav()">Home</md-button></a>
					</md-item-content>
				</md-item>


                <md-item>
                    <md-item-content>
                        <a href="#/list" style="width:100%;font-size:14px"><md-button class="sub-menu-button "ng-click="closeNav()" >Insurance Companies</md-button></a>
                    </md-item-content>
                </md-item>

				<md-item>
					<md-item-content>
					<a href="#/registration" style="width:100%;font-size:14px"><md-button class="sub-menu-button "ng-click="closeNav()" >Registration</md-button></a>
					</md-item-content>
				</md-item>

			</md-list>
		</md-sidenav>
		<md-toolbar style="background-color:#7CFC00 !important">
			<div layout="row" >
				<div flex>
					<md-button class="menu-button" aria-label="Profile" ng-click="toggleLeft()"> <md-icon
						icon="/img/navigation/2x_web/ic_menu_black_48dp.png"
						style="width: 24px; height: 24px;"></md-icon> </md-button>
				</div>
				<div flex>
					<h2 class="md-toolbar-tools">
						<center><span style="color:black">INSURANCE APP</span></center>
					</h2>
				</div>
			</div>
		</md-toolbar>

	</section>
	<!-- Put app content here -->
	<ng-view />
	</md-card-content>
    </md-card>


</body>


</html>
