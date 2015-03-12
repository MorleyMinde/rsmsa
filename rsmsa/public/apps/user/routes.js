/**
 * Created by kelvin on 1/29/15.
 */
angular.module("rsmsaApp").config( function($routeProvider){
    $routeProvider.when("/home",{
        templateUrl: 'views/home.html',
        controller: 'userAppCtrl'
    });

    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});