/**
 * Created by kelvin on 1/29/15.
 */

angular.module("rsmsaApp")
    .controller("driverImportCtrl",function ($scope, $upload) {
        $scope.$watch('files', function () {
            $scope.upload($scope.files);
        });
        $scope.importoption = 'skip';
        $scope.progressParcent = 0;
        $scope.data.imported = [];
        $scope.upload = function (files) {
            $scope.data.imported = [];
            if (files && files.length) {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    $upload.upload({
                        url: '../../driver/upload',
                        file: file,
                        data: $scope.importoption
                    }).progress(function (evt) {
                        var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                        $scope.progressParcent = progressPercentage;
                        console.log('progress: ' + progressPercentage + '% ' +
                            evt.config.file.name);
                    }).success(function (data, status, headers, config) {
                        $scope.progressParcent = 0;
                        $scope.data.toImport = data.length;
                        $scope.data.imported = data;
                        $scope.data.duplicates = data.duplicates;
                        $scope.data.newValues = data.newValue;
                        console.log('file ' + config.file.name + 'uploaded. Response: ' +
                            JSON.stringify(data));
                    });
                }
            }
        };
    });

//pulling incolmplete requests

