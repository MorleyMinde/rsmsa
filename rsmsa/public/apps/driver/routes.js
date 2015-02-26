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
    $routeProvider.when("/driver/:license/offences",{
        templateUrl: '/app/offence/views/offencelist.html',
        controller: 'offenceListController'
    });
    $routeProvider.when("/offence/:request/:id",{
        templateUrl: '/app/offence/views/offenceForm.html',
        controller: 'offenceFormController'
    });
    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});