/**
 * Created by kelvin on 3/1/15.
 */
angular.module("rsmsaApp")
    .controller("userAppCtrl",function($scope,$http,$mdDialog,$mdToast,$animate){
        $scope.currentKaya = {};
        $scope.currentSaving = false;
        $scope.currentUpdating = false;
        $scope.currentEditting = false;
        $scope.kayaSavedSuccess = false;
        $scope.kayaUpdatedSuccess = false;
        $scope.kayaSavedFalue = false;
        $scope.kayaUpdateFalue = false;
        $scope.showEditAdd = false;
        $scope.data = {};
        //getting districts
        $http.get("/districts").success(function(data){
            $scope.data.districts = data;
            $scope.data.usedDistricts = [];
            $scope.data.usedDistricts1 = [];
            angular.forEach(data,function(datta){
                $scope.data.usedDistricts.push({name: datta.name,id:datta.id, ticked: false });
                $scope.data.usedDistricts1.push({name: datta.name,id:datta.id, ticked: false });
            });
        });

        //getting Regions
        $http.get("/regions").success(function(data){
            $scope.data.regions = data;
            $scope.data.usedRegions = [];
            $scope.data.usedRegions1 = [];
            angular.forEach(data,function(value){
                $scope.data.usedRegions.push({name: value.name,id:value.id, ticked: false})
                $scope.data.usedRegions1.push({name: value.name,id:value.id, ticked: false})
            });
        });

        //getting Apps
        $http.get("/apps/manifests").success(function(data) {
            $scope.data.usedApps = [];
            angular.forEach(data,function(value){
                $scope.data.usedApps.push({name: value.name,id:value.id, ticked: false})
            });
        });

        $http.get("/users/").success(function(data){
            $scope.users = data;
            angular.forEach($scope.users,function(value){
                $http.get("/user/apps/"+value.id).success(function(data) {
                    value.apps = data;
                });
                $http.get("/user/areas/"+value.id).success(function(data) {
                    value.areas = data;
                });
                $http.get("/user/logs/"+value.id).success(function(data) {
                    value.logs = data;
                });
            });


        });

        $http.get("/loggenInuser/").success(function(data){
            $scope.currentKaya = data;
        });


        $scope.saveUser = function(user){
            $scope.currentSaving = true;

            if($scope.currentKaya.level == 'Regions'){
                var dd = [];
                var dd1 = [];
                angular.forEach($scope.data.selectedRegions,function(area){
                    dd.push(area.id);
                });
                user.area = dd;
                angular.forEach($scope.data.selectedRegions1,function(area){
                    dd1.push(area.id);
                });
                user.area = dd;
                user.area1 = dd1;
            }if($scope.currentKaya.level == 'Districts'){
                var dd = [];
                var dd1 = [];
                angular.forEach($scope.data.selectedDistricts,function(area){
                    dd.push(area.id);
                });
                angular.forEach($scope.data.selectedDistricts1,function(area){
                    dd1.push(area.id);
                });
                user.area = dd;
                user.area1 = dd1;
            }
            var apppss = [];
            angular.forEach($scope.data.selectedApps,function(apps){
                apppss.push(apps.id);
            });
            user.apps = apppss;
            $http.post("/users", user).success(function (newUser) {
                $http.get("/user/apps/"+newUser.id).success(function(data) {
                    newUser.apps = data;
                });
                $http.get("/user/areas/"+newUser.id).success(function(data) {
                    newUser.areas = data;
                });
                $http.get("/user/logs/"+newUser.id).success(function(data) {
                    newUser.logs = data;
                });
                $scope.users.push(newUser);
                $scope.currentKaya = {};
                $scope.kayaSavedSuccess = true;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = false;
                $scope.repassword = "";
                $mdToast.show(
                    $mdToast.simple()
                        .content('User Created Successfully!')
                        .position($scope.getToastPosition())
                        .hideDelay(3000)
                );
                $scope.showEditAdd = false;
            }).error(function(){
                $scope.kayaSavedSuccess = false;
                $scope.currentSaving = false;
                $scope.kayaSavedFalue = true;
            });
        }

        $scope.showAEdit = function(user){
            $scope.showEditAdd = true;
            $scope.currentEditting = true;
            $scope.currentKaya = user;
        }

        $scope.showAdd = function(){
            $scope.showEditAdd = true;
            $scope.currentEditting = false;
            $scope.currentKaya = {};
        }

        $scope.cancelEditting = function(){
            $scope.showEditAdd = false;
            $scope.currentEditting = false;
            $scope.currentKaya = {};
        }

        $scope.cancelAdding = function(){
            $scope.showEditAdd = false;
            $scope.currentKaya = {};
        }

        $scope.updateUser = function(user){
            $scope.currentUpdating = true;
            $http.post("index.php/user/"+user.id, user).success(function (newUser) {
                for (var i = 0; i < $scope.users.length; i++) {
                    if ($scope.users[i].id == newUser.id) {
                        $scope.users[i] = newUser;
                        break;
                    }
                }
                $mdToast.show(
                    $mdToast.simple()
                        .content('User Updated Successfully!')
                        .position($scope.getToastPosition())
                        .hideDelay(3000)
                );
                $scope.showEditAdd = false;
                $scope.kayaUpdatedSuccess = true;
                $scope.currentUpdating = false;
                $scope.kayaUpdateFalue = false;
            }).error(function(){
                $scope.kayaUpdatedSuccess = false;
                $scope.currentUpdating = false;
                $scope.kayaUpdateFalue = true;
            })

        }
        $scope.toastPosition = {
            bottom: true,
            top: false,
            left: false,
            right: true
        };

        $scope.getToastPosition = function() {
            return Object.keys($scope.toastPosition)
                .filter(function(pos) { return $scope.toastPosition[pos]; })
                .join(' ');
        };

        $scope.deletedUser = [];
        $scope.deletingdUser = [];
        $scope.showConfirm = function(ev,id) {
            var confirm = $mdDialog.confirm()
                .title('Are you sure you want to delete this User')
                .content('This action is irreversible')
                .ariaLabel('Lucky day')
                .ok('Delete')
                .cancel('Cancel')
                .targetEvent(ev);
            $mdDialog.show(confirm).then(function() {
                $scope.deletingdUser[id] = true;
                $http.post("/delete/user/"+id).success(function (newVal) {
                    $scope.deletedUser[id] = true;
                    $mdToast.show(
                        $mdToast.simple()
                            .content('User Deleted Successfully!')
                            .position($scope.getToastPosition())
                            .hideDelay(3000)
                    );
                });
            }, function() {

            });
        };
        $scope.passcheck = false;
        $scope.passwordNoMatch = function(){
            if($scope.currentKaya.password){
                if($scope.currentKaya.password != "" && $scope.repassword && $scope.repassword != ""){
                    if($scope.currentKaya.password == $scope.repassword){
                        $scope.passcheck = true;
                    }else{
                        $scope.passcheck = false;
                    }
                }else{
                    $scope.passcheck = false;
                }
            }
        }

        $scope.showDetails = function(ev,user) {
            $scope.selectedUser = user;
            $mdDialog.show({
                controller: DialogController,
                templateUrl: 'views/dialog.html',
                targetEvent: ev
            })
                .then(function(answer) {

                }, function() {
                });
        };
        $scope.showLogs = function(ev,user) {
            $scope.selectedUser = user;
            $mdDialog.show({
                controller: LogsController,
                templateUrl: 'views/logs.html',
                targetEvent: ev
            })
                .then(function(answer) {

                }, function() {
            });
        };

    });

function DialogController($scope, $mdDialog) {
    $scope.currUser = angular.element("#listTable").scope().selectedUser;
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
function LogsController($scope, $mdDialog) {
    $scope.currUser = angular.element("#listTable").scope().selectedUser;
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