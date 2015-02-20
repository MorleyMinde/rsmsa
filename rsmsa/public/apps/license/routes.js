/**
 * Created by kelvin on 1/29/15.
 */
angular.module("rsmsaApp").config( function($routeProvider){
    $routeProvider.when("/home",{
        templateUrl: 'views/home.html',
        controller: 'vehicleAppCtrl'
    });
    $routeProvider.when("/list",{
        templateUrl: 'views/list.html',
        controller: 'vehicleAppCtrl'
    });
    $routeProvider.when("/import",{
        templateUrl: 'views/import.html',
        controller: 'vehicleImportCtrl'
    });$routeProvider.when("/add",{
        templateUrl: 'views/add.html',
        controller: 'vehicleAddCtrl'
    });$routeProvider.when("/insurance",{
        templateUrl: 'views/insurance.html',
        controller: 'insuranceAddCtrl'
    });$routeProvider.when("/inspection",{
        templateUrl: 'views/inspection.html',
        controller: 'vehicleAddCtrl'
    });
    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});