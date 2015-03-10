<!DOCTYPE html>
<html ng-app="rsmsaApp" ng-controller="rsmsaAppController">
<head>

<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="/angular-material/angular-material.css">
<link rel="stylesheet" href="/bootstrap/bootstrap.min.css">

<!-- Angular Material Dependencies -->
<script src="/js/jquery/jquery.js"></script>
<script src="/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/js/jquery/jquery-ui.min.css">

<script src="/angular/angular.min.js"></script>
<script src="/hammerjs/hammer.min.js"></script>
<script src="/angular-animate/angular-animate.min.js"></script>
<script src="/angular-aria/angular-aria.min.js"></script>
<script src="/angular/angular-messages.min.js"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
<script src="/angular-material/angular-material.min.js"></script>
<script src="/angular-material/angular-text.min.js"></script>
<script src="/angular/angular-route.min.js"></script>
<script src="/angular/ui-date/date.js"></script>
<script src="/angular/highcharts/highcharts-custom.js"></script>
<script src="/angular/highcharts/highcharts-ng.js"></script>
<link rel="stylesheet"href="/angular-material/angular-text.min.css">
<!-- <link rel="stylesheet" href="/css/style.css"> -->
<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
<style>
.container {
	padding:0;
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
	left: 12.5%;
	top: 20px;
	overflow: hidden;
	min-height:500px;
}
.view{
	padding:80px;
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
<script src="/js/Chart.js"></script>
<script src="controllers/rsmsaAppController.js"></script>
<!--<script ng-repeat="controller in appControllers" ng-src="{{getContollerUrl(controller)}}"></script>-->

<script src="controllers/offenceRegController.js"></script>
</head>
<body style="" >
	<div class="container">
		<md-content> <md-toolbar class="md-tall md-warn md-hue-3" style="background-color: {{app.color.c500}}  !important"> </md-toolbar>
		
		</md-content>
	</div>
	<md-card class="main"> 
	<md-card-content class="content">
	<section layout="row" flex>
		<md-sidenav class="md-sidenav-left md-whiteframe-z2"
			md-component-id="left"> 
			<md-toolbar class="md-theme-light" style="background-color:{{app.color.c200}} !important">
				<h1 class="md-toolbar-tools">Menu</h1>
			</md-toolbar> 
			<md-list>
				<md-item ng-repeat="menu in app.menu">
					<md-item-content>
					<a href="#{{menu.route}}" style="width:100%"><md-button class="sub-menu-button" ng-click="closeNav()">{{menu.name}}</md-button></a>
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
	<div class="view">
		<div ng-view="#/home" />
	</div>
	<div>
	
	</div>
	</md-card-content> </md-card>
</body>
</html>