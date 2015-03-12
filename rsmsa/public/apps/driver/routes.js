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
    $routeProvider.when("/driver/:license/offences",{
        templateUrl: '/app/offence/views/offencelist.html',
        controller: 'offenceListController'
    });
    $routeProvider.when("/offence/:request/:id",{
        templateUrl: '/app/offence/views/offenceForm.html',
        controller: 'offenceFormController'
    });
    $routeProvider.when("/offence",{
        templateUrl: 'views/offences.html',
        controller: 'driverOffCtrl'
    });
    $routeProvider.when("/accidents",{
        templateUrl: 'views/accidents.html',
        controller: 'driverAccCtrl'
    });

    $routeProvider.when("/driver/accidents/:license_id",{
        templateUrl: 'views/accident.html',
        controller: 'accidentCtrl'
    });

    $routeProvider.when('/api/accident/view/:accident_id' ,{
        templateUrl: 'views/view_accident.html',
        controller:'ViewAccidentController'
    });


    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});
