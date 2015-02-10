<!DOCTYPE html>
<html ng-app="rsmsaApp"  ng-controller="AppCtrl">
<head>
<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="/angular-material/angular-material.css">

<!-- Angular Material Dependencies -->
    <script src="<?php echo asset('apps/administrative_unit/js/jquery.js') ?>"></script>
<script src="<?php echo asset('angular/angular.min.js')?>"></script>
<script src="<?php echo asset('angular-animate/angular-animate.min.js')?>"></script>
<script src="<?php echo asset('angular-aria/angular-aria.min.js')?>"></script>
<script src="<?php echo asset('angular/angular-messages.min.js')?>"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
    <script src="<?php echo asset('apps/administrative_unit/js/bootstrap.js') ?>"></script>
    <link href="<?php echo asset('apps/administrative_unit/css/bootstrap.css') ?>" rel="stylesheet" />
    <link href="<?php echo asset('apps/administrative_unit/css/bootstrap-theme.css') ?>" rel="stylesheet" />
    <script src="<?php echo asset('apps/administrative_unit/js/abn_tree_directive.js') ?>"></script>
    <link href="<?php echo asset('apps/administrative_unit/css/abn_tree.css') ?>" rel="stylesheet" />
<script src="<?php echo asset('angular-material/angular-material.min.js')?>"></script>
<script src="<?php echo asset('angular-material/angular-text.min.js')?>"></script>
<script src="<?php echo asset('angular/angular-route.min.js')?>"></script>

<link rel="stylesheet"href="<?php echo asset('angular-material/angular-text.min.css')?>">
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>">
<link rel="stylesheet" href="<?php echo asset('apps/driver/font-awesome/css/font-awesome.css')?>">
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
    <!--<script ng-repeat="app in app.routes" ng-src="{{getControllerSrc(app.controller)}}"></script>-->
    <script>
        var mainModule = angular.module('rsmsaApp', ['ngMaterial', "ngRoute",'ngAnimate','ngMaterial','angularBootstrapNavTree']);
        mainModule.controller('AppCtrl', function($scope, $http, $mdSidenav, $log,$route) {
            //When menu button is clicked show the left menu
            $scope.toggleLeft = function() {
                $mdSidenav('left').toggle();
            };
            $scope.closeNav = function() {
                $mdSidenav('left').close();
            };
            $scope.app = {};
            $scope.data ={};
            $http.get("/regions").success(function(data){
                $scope.data.regions = data;
            });

            //getting all districts
            $http.get("/districts").success(function(data){
                $scope.data.districts = data;
            });

            //setting active link on top menu
            $scope.isActive = function (viewLocation) {
                var active = (viewLocation === $location.path());
                return active;
            };

            $scope.addTwo = function(one,two){
                return parseInt(one) + parseInt(two);
            }

            $scope.matchName = function(query) {
                return function(friend) { return friend.region_id == query; }
            };

            $scope.getWards = function(id){
                $http.get("/wards/district/"+id).success(function(distr){
                    $scope.data.disward = distr;
                });
            }

            $scope.getVillages = function(id){
                $http.get("/village/ward/"+id).success(function(distr){
                    $scope.data.disvillage = distr;
                });
            }

            $scope.findSum = function(kata){
                return Math.floor(kata.male) + Math.floor(kata.female);
            }
            $scope.findDiff = function(answer){
                if(answer/2 > 5){
                    return 5
                }else{
                    return answer/2
                }
            }

            $scope.getDetails =function(region){
                if(region.districts == null){
                    $http.get("/districts/region/"+region.id).success(function(distr){
                        region.districts = distr;
                        angular.forEach(region.districts,function(val){
                            var district = val;
                            $http.get("/people/district/"+val.id).success(function(ppl){
                                district.people = ppl;
                            });
                        });
                    });
                }
            }

        });
    </script>
    <script src="<?php echo asset('apps/administrative_unit/routes.js')?>"></script>
    <script src="<?php echo asset('apps/administrative_unit/controllers/OrgUnitAppCtrl.js')?>"></script>
</head>

<body style="" ng-controller="OrgUnitAppCtrl">
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
			<!-- Menu buttons -->
                <md-item>
                    <md-item-content>
                        <a href="#/home" style="width:100%" ng-click="closeNav()"><md-button class="sub-menu-button">Home</md-button></a>
                    </md-item-content>
                </md-item>
				<md-item>
					<md-item-content>
					<a href="#/licence" style="width:100%" ng-click="closeNav()"><md-button class="sub-menu-button">Administrative Units</md-button></a>
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
						<span>Drivers Licence</span>
					</h2>
				</div>
			</div>
		</md-toolbar>
	</section>
	<ng-view />
	</md-card-content> </md-card>
</body>
</html>
