<!DOCTYPE html>
<html ng-app="accidentApp"  ng-controller="AppCtrl">
<head>

<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="<?php echo asset('angular-material/angular-material.css')?>">

<!-- Angular Material Dependencies -->

<script src="<?php echo asset('js/jquery/jquery.js')?>"></script>
<script src="<?php echo asset('js/jquery/jquery-ui.js')?>"></script>
<script src="<?php echo asset('angular/angular.min.js')?>"></script>
<script src="<?php echo asset('angular-animate/angular-animate.min.js')?>"></script>
<script src="<?php echo asset('angular-aria/angular-aria.min.js')?>"></script>
<script src="<?php echo asset('angular/angular-messages.min.js')?>"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
<script src="<?php echo asset('angular-material/angular-material.min.js')?>"></script>
<script src="<?php echo asset('angular-material/angular-text.min.js')?>"></script>
<script src="<?php echo asset('angular/angular-route.min.js')?>"></script>
<script src="<?php echo asset('js/highcharts-ng.js')?>"></script>
<script src="<?php echo asset('angular/ui-date/date.js')?>"></script>


    <!-- Angular Material Dependencies -->

<link rel="stylesheet" href="<?php echo asset('js/jquery/jquery-ui.min.css')?>">
<link rel="stylesheet" href="<?php echo asset('angular-material/angular-text.min.css')?>">
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>">
<link rel="stylesheet" href="<?php echo asset('apps/accident/css/bootstrap.css')?>"/>
<link rel="stylesheet" href="<?php echo asset('apps/accident/css/bootstrap-theme.css')?>"/>
<link rel="stylesheet" href="<?php echo asset('apps/accident/css/material-design.css')?>"/>

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
    min-height: 200px;
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

var mainModule = angular.module('accidentApp', ['ngMaterial', "ngRoute","ui.date"]).config(function ($routeProvider) {

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

<script src="<?php echo asset('apps/accident/js/accident.js')?>"></script>
<script src="<?php echo asset('apps/accident/js/controllers/AccidentController.js')?>"></script>
<script src="<?php echo asset('apps/accident/js/controllers/AccidentListController.js')?>"></script>
<script src="<?php echo asset('apps/accident/js/controllers/AccidentChartsController.js')?>"></script>
<script src="<?php echo asset('apps/accident/js/controllers/AccidentReportController.js')?>"></script>
<script src="<?php echo asset('apps/accident/js/Chart.js')?>"></script>

</head>

<body>

	<div class="container">
		<md-content> <md-toolbar class="md-tall md-warn md-hue-3" style="background-color:#00F5FF !important"> </md-toolbar>

		</md-content>
	</div>
	<md-card class="main">
	<md-card-content class="content">
	<section layout="row" flex>
		<md-sidenav class="md-sidenav-left md-whiteframe-z2"
			md-component-id="left">
			<md-toolbar class="md-theme-light" style="background-color:#B0E0E6 !important">
				<h1 class="md-toolbar-tools">Menu</h1>
			</md-toolbar>
			<md-list>
			<!-- Menu buttons -->
				<md-item>
					<md-item-content>
					<a href="#/report" style="width:100%;font-size:14px"><md-button class="sub-menu-button" ng-click="closeNav()">Report Accident</md-button></a>
					</md-item-content>
				</md-item>


                <md-item>
                    <md-item-content>
                        <a href="#/reported" style="width:100%;font-size:14px"><md-button class="sub-menu-button "ng-click="closeNav()" >View Accidents Reported</md-button></a>
                    </md-item-content>
                </md-item>

				<md-item>
					<md-item-content>
					<a href="#/statistics" style="width:100%;font-size:14px"><md-button class="sub-menu-button "ng-click="closeNav()" >View Accident Statistics</md-button></a>
					</md-item-content>
				</md-item>

			</md-list>
		</md-sidenav>
		<md-toolbar style="background-color:#B0E0E6 !important">
			<div layout="row" >
				<div flex>
					<md-button class="menu-button" aria-label="Profile" ng-click="toggleLeft()"> <md-icon
						icon="/img/navigation/2x_web/ic_menu_black_48dp.png"
						style="width: 24px; height: 24px;"></md-icon> </md-button>
				</div>
				<div flex>
					<h2 class="md-toolbar-tools">
						<span style="color:black">ACCIDENT APP</span>
					</h2>
				</div>
			</div>
		</md-toolbar>

        <script>
            // line chart data
            var buyerData = {
                labels : ["January","February","March","April","May","June"],
                datasets : [
                    {
                        fillColor : "rgba(172,194,132,0.4)",
                        strokeColor : "#ACC26D",
                        pointColor : "#fff",
                        pointStrokeColor : "#9DB86D",
                        data : [203,156,99,251,305,247]
                    }
                ]
            }
            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');
            // draw line chart
            new Chart(buyers).Line(buyerData);
            // pie chart data
            var pieData = [
                {
                    value: 20,
                    color:"#878BB6"
                },
                {
                    value : 40,
                    color : "#4ACAB4"
                },
                {
                    value : 10,
                    color : "#FF8153"
                },
                {
                    value : 30,
                    color : "#FFEA88"
                }
            ];
            // pie chart options
            var pieOptions = {
                segmentShowStroke : false,
                animateScale : true
            }
            // get pie chart canvas
            var countries= document.getElementById("countries").getContext("2d");
            // draw pie chart
            new Chart(countries).Pie(pieData, pieOptions);
            // bar chart data
            var barData = {
                labels : ["January","February","March","April","May","June"],
                datasets : [
                    {
                        fillColor : "#48A497",
                        strokeColor : "#48A4D1",
                        data : [456,479,324,569,702,600]
                    },
                    {
                        fillColor : "rgba(73,188,170,0.4)",
                        strokeColor : "rgba(72,174,209,0.4)",
                        data : [364,504,605,400,345,320]
                    }
                ]
            }
            // get bar chart canvas
            var income = document.getElementById("income").getContext("2d");
            // draw bar chart
            new Chart(income).Bar(barData);
        </script>

	</section>
	<!-- Put app content here -->
	<ng-view />
	</md-card-content>
    </md-card>


</body>


</html>
