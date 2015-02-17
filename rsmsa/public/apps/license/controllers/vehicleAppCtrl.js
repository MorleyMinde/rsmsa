/**
 * Created by kelvin on 1/29/15.
 */
angular.module('rsmsaApp')
    .controller('vehicleAppCtrl',function($scope,$http,$mdDialog){
        $scope.data = {};
        $http.get('../../vehicle').success(function(data){
            $scope.data.vehicles = data;
        });

        $scope.deleteVehicle = function (vehicle) {
            $scope.data.vehicles.splice($scope.data.vehicles.indexOf(vehicle), 1);
            $http.post("../../vehicle/delete/"+vehicle.id).success(function () {

            });

        }

        $scope.showConfirm = function(ev,vehicle) {
            var confirm = $mdDialog.confirm()
                .title('Are you sure you want to delete this Entry')
                .content('This action is irreversible')
                .ariaLabel('Lucky day')
                .ok('Delete')
                .cancel('Cancel')
                .targetEvent(ev);
            $mdDialog.show(confirm).then(function() {
                $scope.deleteVehicle(vehicle);
            }, function() {

            });
        };

        $scope.showAdvanced = function(ev,vehicle) {
            $scope.selectedVehicle = vehicle;
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
    $scope.vehicle = angular.element("#listTable").scope().selectedVehicle;
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