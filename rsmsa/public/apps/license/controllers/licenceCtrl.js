/**
 * Created by kelvin on 2/27/15.
 */
angular.module('rsmsaApp')
    .controller('licenceCtrl',function($scope,$http,$mdDialog){
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


        $scope.saveVehicleLicence = function(Licence){
            $scope.currentSaving = true;
            $http.post("../../vehicle/road_licence", Licence).success(function (newVehicle) {
                $scope.currentKaya = {};
                $scope.kayaSavedSuccess = true;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = false;
                $scope.currCar = null;
            }).error(function(){
                $scope.kayaSavedSuccess = false;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = true;
            });
        }
        $scope.saveBussinesLicence = function(Licence){
            $scope.currentSaving = true;
            $http.post("../../vehicle/business_licence", Licence).success(function (newVehicle) {
                $scope.currentKaya = {};
                $scope.kayaSavedSuccess = true;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = false;
                $scope.currCar = null;
            }).error(function(){
                $scope.kayaSavedSuccess = false;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = true;
            });
        }

    });