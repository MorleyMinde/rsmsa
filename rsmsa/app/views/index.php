<!DOCTYPE html>
<html ng-app="rsmsaApp">
<head>

<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="../angular-material/angular-material.css">

<!-- Angular Material Dependencies -->
<script src="../hammerjs/hammer.min.js"></script>
<script src="../angular/angular.min.js"></script>
<script src="../angular-animate/angular-animate.min.js"></script>
<script src="../angular-aria/angular-aria.min.js"></script>
<script src="../angular/angular-messages.min.js"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
<script src="../angular-material/angular-material.min.js"></script>

<script src="../angular-material/angular-text.min.js"></script>
<link rel="stylesheet" href="../angular-material/angular-text.min.css">
<script src="../controllers/offenceController.js"></script>

<script>
angular.module('rsmsaApp', ['ngMaterial']).config(function($mdThemingProvider) {
	  $mdThemingProvider.theme('default')
	    .primaryColor('pink')
	    .accentColor('orange');
	})
.controller('AppCtrl', function($scope, $timeout, $mdSidenav, $log) {
  $scope.toggleLeft = function() {
    $mdSidenav('left').toggle()
                      .then(function(){
                          $log.debug("toggle left is done");
                      });
  };
  $scope.toggleRight = function() {
    $mdSidenav('right').toggle()
                        .then(function(){
                          $log.debug("toggle RIGHT is done");
                        });
  };
})
.controller('LeftCtrl', function($scope, $timeout, $mdSidenav, $log) {
  $scope.close = function() {
    $mdSidenav('left').close()
                      .then(function(){
                        $log.debug("close LEFT is done");
                      });
  };
})
.controller('RightCtrl', function($scope, $timeout, $mdSidenav, $log) {
  $scope.close = function() {
    $mdSidenav('right').close()
                        .then(function(){
                          $log.debug("close RIGHT is done");
                        });
  };
});
</script>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div ng-controller="AppCtrl" layout="column" layout-fill>
  <section layout="row" flex>
    <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="$media('gt-md')">
      <md-toolbar class="md-theme-indigo">
        <h1 class="md-toolbar-tools">Sidenav Left</h1>
      </md-toolbar>
      <md-content class="md-padding" ng-controller="LeftCtrl">
        <md-button ng-click="close()" class="md-primary" hide-gt-md>
          Close Sidenav Left
        </md-button>
        <p hide-md show-gt-md>
          This sidenav is locked open on your device. To go back to the default behavior,
          narrow your display.
        </p>
      </md-content>
    </md-sidenav>
    <md-content flex class="md-padding">
      <div layout="column" layout-fill layout-align="center center">
        <p>
        The left sidenav will 'lock open' on a medium (>=960px wide) device.
        </p>
        <div>
          <md-button ng-click="toggleLeft()" class="md-primary" hide-gt-md>
            Toggle left
          </md-button>
        </div>
        <div>
          <md-button ng-click="toggleRight()" class="md-primary">
            Toggle right
          </md-button>
        </div>
      </div>
    </md-content>
    <md-sidenav class="md-sidenav-right md-whiteframe-z2" md-component-id="right">
      <md-toolbar class="md-theme-light">
        <h1 class="md-toolbar-tools">Sidenav Right</h1>
      </md-toolbar>
      <md-content ng-controller="RightCtrl" class="md-padding">
        <md-button ng-click="close()" class="md-primary">
          Close Sidenav Right
        </md-button>
      </md-content>
    </md-sidenav>
  </section>
</div>
</body>
</html>