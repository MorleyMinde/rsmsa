/**
 * Created by kelvin on 1/29/15.
 */
angular.module("rsmsaApp").config( function($routeProvider){
    $routeProvider.when("/home",{
        templateUrl: 'views/list.html',
        controller: 'driverAppCtrl'
    });
    $routeProvider.when("/licence",{
        templateUrl: 'views/licence.html',
        controller: 'driverImportCtrl'
    });
    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});