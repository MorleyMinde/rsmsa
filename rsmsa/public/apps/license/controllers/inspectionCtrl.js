/**
 * Created by kelvin on 2/20/15.
 */
angular.module('rsmsaApp')
    .controller('inspectionCtrl',function($scope,$http,$mdDialog){
        $scope.data = {};
        $scope.currentKaya = {};
        $scope.currentSaving = false;
        $scope.currentUpdating = false;
        $scope.currentEditting = false;
        $scope.kayaSavedSuccess = false;
        $scope.kayaUpdatedSuccess = false;
        $scope.kayaSavedFalue = false;
        $scope.kayaUpdateFalue = false;

        $http.get('../../vehicle').success(function(data){
            $scope.data.vehicles = data;
        });

        $scope.changeCar = function(car,cars){
            $scope.currCar = null;
            angular.forEach(cars,function(value){
                if(value.plate_number == car){
                    $scope.currCar = value;
                }
            })
        }
        $scope.passed=0;
        $scope.failed = 0
        $scope.countInspection = function(inspections){
            $scope.passed=0;
            $scope.failed = 0
            angular.forEach(inspections,function(value,key){
                if(value == "Passed"){
                    $scope.passed = $scope.passed + 1;
                }else if(value == "Failed"){
                    $scope.failed = $scope.failed + 1;
                }
            })
        }

        $scope.checkCar = function(car,cars){
            $scope.currCar = null;
            if(car && car != ""){
                if(car.length > 5){
                    angular.forEach(cars,function(value){
                        if(value.plate_number == car){
                            $scope.currCar = value;
                        }
                    })
                }
            }
        }
        $scope.dateOptions = {
            changeYear: true,
            changeMonth: true,
            dateFormat: 'mm-dd-yy'
        };


        $scope.saveVehicleInspection = function(Inspection){
            $scope.currentSaving = true;
            $scope.currentKaya.pass     =   $scope.passed;
            $scope.currentKaya.fail     =   $scope.failed;
            $scope.currentKaya.parcent  =   (parseInt($scope.passed)/30)*100;
            $http.post("../../vehicle/inspection", Inspection).success(function (newVehicle) {
                $scope.currentKaya = {};
                $scope.kayaSavedSuccess = true;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = false;
            }).error(function(){
                $scope.kayaSavedSuccess = false;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = true;
            });
        }

        $scope.showAdvanced = function(ev) {
            $mdDialog.show({
                controller: DialogController,
                templateUrl: 'views/help.html',
                targetEvent: ev
            })
                .then(function(answer) {

                }, function() {
                });
        };
    });

function DialogController($scope, $mdDialog) {

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