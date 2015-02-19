/**
 * Created by PAUL on 2/18/2015.
 */
angular.module('insuranceApp')
    .controller('InsuranceAppCtrl',function($scope,$http,$mdDialog){
        $scope.data = {};
        $scope.InsuraneCurrentSaving = false;
        $scope.insuranceSavedSuccess = false;
        $scope.insuranceSavedFalue = false;

        $scope.saveInsurance = function(insurance){
            $scope.insuraneCurrentSaving = true;
            $http.post("/api/insurance/save", insurance).success(function (newInsurance) {

                console.log(newInsurance);
                $scope.newInsurance = {};
                $scope.insuranceSavedSuccess = true;
                $scope.insuraneCurrentSaving = false;
                $scope.insuranceSavedFailure = false;

                $http.get('/#/registration').success(function(data){

                });

            }).error(function(){
                $scope.insuranceSavedSuccess = false;
                $scope.insuraneCurrentSaving = false;
                $scope.insuranceSavedFailure = true;
            });
        }

        $http.get('/api/insurance/companies').success(function(data){
            $scope.data.insurance = data;

        });

        $scope.deleteInsurance= function (insurance) {
            $scope.data.insurance.splice($scope.data.insurance.indexOf(driver), 1);
            $http.post("/api/insurance/delete/"+ insurance.id).success(function () {

            });

        }

        $scope.showConfirm = function(ev,insurance) {
            var confirm = $mdDialog.confirm()
                .title('Are you sure you want to delete this Entry')
                .content('This action is irreversible')
                .ariaLabel('Lucky day')
                .ok('Delete')
                .cancel('Cancel')
                .targetEvent(ev);
            $mdDialog.show(confirm).then(function() {
                $scope.deleteInsurance(insurance);
            }, function() {

            });
        };

        $scope.showAdvanced = function(ev,insurance) {
            $scope.selectedInsurance = insurance;
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
    $scope.insurance = angular.element("#listTable").scope().selectedInsurance;
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