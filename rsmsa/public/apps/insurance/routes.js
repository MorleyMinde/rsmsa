/**
 * Created by PAUL on 2/18/2015.
 */
angular.module("insuranceApp").config( function($routeProvider){
    $routeProvider.when("/home",{
        templateUrl: 'views/home.html',
        controller: 'InsuranceAppCtrl'
    });
    $routeProvider.when("/list",{
        templateUrl: 'views/list.html',
        controller: 'InsuranceAppCtrl'
    });
    $routeProvider.when("/registration",{
        templateUrl: 'views/add.html',
        controller: 'InsuranceAppCtrl'
    });

    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});