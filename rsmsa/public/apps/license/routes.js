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
    });
    $routeProvider.when("/vehicle/:plate_number/offences",{
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