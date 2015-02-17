/**
 * Created by kelvin on 1/29/15.
 */
angular.module('rsmsaApp')
    .controller('driverAppCtrl',function($scope,$http,$mdDialog){
        $scope.data = {};
        $http.get('../../drivers').success(function(data){
           $scope.data.drivers = data;
        });

        $scope.deleteDriver = function (driver) {
            $scope.data.drivers.splice($scope.data.drivers.indexOf(driver), 1);
            $http.post("../../driver/delete/"+driver.id).success(function () {

            });

        }

        $scope.showConfirm = function(ev,driver) {
            var confirm = $mdDialog.confirm()
                .title('Are you sure you want to delete this Entry')
                .content('This action is irreversible')
                .ariaLabel('Lucky day')
                .ok('Delete')
                .cancel('Cancel')
                .targetEvent(ev);
            $mdDialog.show(confirm).then(function() {
                $scope.deleteDriver(driver);
            }, function() {

            });
        };

        $scope.showAdvanced = function(ev,driver) {
            $scope.selectedDriver = driver;
            $mdDialog.show({
                controller: DialogController,
                templateUrl: 'views/dialog.html',
                targetEvent: ev
            })
                .then(function(answer) {

                }, function() {
                });
        };
    });

function DialogController($scope, $mdDialog) {
    $scope.driver = angular.element("#listTable").scope().selectedDriver;
    $scope.hide = function() {
        $mdDialog.hide();
    };
    $scope.cancel = function() {
        $mdDialog.cancel();
    };
    $scope.answer = function(answer) {
        $mdDialog.hide(answer);
    };
}