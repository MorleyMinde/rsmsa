/**
 * Created by kelvin on 1/29/15.
 */
angular.module("rsmsaApp").config( function($routeProvider){
    $routeProvider.when("/home",{
        templateUrl: 'views/home.html',
        controller: 'driverAppCtrl'
    });
    $routeProvider.when("/list",{
        templateUrl: 'views/list.html',
        controller: 'driverAppCtrl'
    });
    $routeProvider.when("/add",{
        templateUrl: 'views/add.html',
        controller: 'driverAddCtrl'
    });
    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});