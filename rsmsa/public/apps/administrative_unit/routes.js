/**
 * Created by kelvin on 1/29/15.
 */
angular.module("rsmsaApp").config( function($routeProvider){
    $routeProvider.when("/home",{
        templateUrl: 'views/stations.html',
        controller: 'OrgUnitAppCtrl'
    });
    $routeProvider.when("/Administrative Units",{
        templateUrl: 'views/stations.html',
        controller: 'OrgUnitAppCtrl'
    });
    $routeProvider.when("/Administrative Units",{
        templateUrl: 'views/list.html',
        controller: 'OrgUnitAppCtrl'
    });
    $routeProvider.when("/import",{
        templateUrl: 'views/licence.html',
        controller: 'OrgUnitAppCtrl'
    });
    $routeProvider.otherwise({
        redirectTo: '/home'
    });
});