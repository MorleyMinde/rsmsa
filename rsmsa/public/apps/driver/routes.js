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
    });$routeProvider.when("/licence",{
        templateUrl: 'views/licence.html',
        controller: 'driverImportCtrl'
    });
    $routeProvider.when("/offence",{
        templateUrl: 'views/offences.html',
        controller: 'driverOffCtrl'
    });
    $routeProvider.when("/accidents",{
        templateUrl: 'views/accidents.html',
        controller: 'driverAccCtrl'
    });
    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});