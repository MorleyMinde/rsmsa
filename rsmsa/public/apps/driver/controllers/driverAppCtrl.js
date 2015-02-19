/**
 * Created by kelvin on 1/29/15.
 */
angular.module('rsmsaApp')
    .controller('driverAppCtrl',function($scope,$http,$mdDialog){
        $scope.data = {};
        $scope.column = 'driving_class';
        $scope.table = {};
        $scope.displayTable = true;
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

        $scope.changeCats = function(){
            $scope.chartConfig.xAxis.categories = [];
            angular.forEach( $scope.data.driving_classes, function( value, key ) {
                if ( value.ticked === true ) {
                    $scope.chartConfig.xAxis.categories.push(value.name);
                }
            });
            $scope.getData();
        }

        $scope.getData = function(){
            $scope.chartConfig.series = [{
                name: 'Motor Vehicle',
                data: []
            }];
            $scope.table.headers = [];
            $scope.table.colums = [];
            angular.forEach($scope.chartConfig.xAxis.categories,function(value){
                $scope.table.headers.push({name:value});
//                $scope.chartConfig.series[0].data.push(Math.floor(Math.random() * 30))
                $http.get('../../driver/'+$scope.column+'/'+value).success(function(data){
                    $scope.table.colums.push({val:data});
                    $scope.chartConfig.series[0].data.push(parseInt(data));
                });
            })
        }


        //getting a list of driving classes
        $http.get('../../driving_classes').success(function(data){
            $scope.data.driving_classes = [];
            angular.forEach(data,function(classes){
                $scope.data.driving_classes.push({icon: "<img src='/img/"+classes.name+".jpg' />",name: classes.name, descr: classes.description,ticked: true})

            })
            $scope.changeCats()

        });
        //changing chart types
        $scope.data.chartType = 'column'
        $scope.changeChart = function(type){
            $scope.displayTable = false;
            if(type == "spider"){
                $scope.chartConfig.options.chart.type = 'line';
                $scope.chartConfig.options.chart.polar = true;
            }else if(type == 'combined'){
                $scope.chartConfig.options.chart.polar =false;
            }else if(type == 'table'){
                $scope.chartConfig.options.chart.polar = false;
                $scope.displayTable = true;
            }else{
                $scope.chartConfig.options.chart.type = type;
                $scope.chartConfig.options.chart.polar = false;
            }

        };

        //drawing some charts
        $scope.chartConfig = {
            options: {
                chart: {
                    type: 'column'
                }
            },
            title: {
                text: 'Motor Vehicle Report'
            },
            xAxis: {
                categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Drivers',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                },column: {
                    stacking: 'normal'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Year 1800',
                data: [107, 31, 635, 203, 2]
            }, {
                name: 'Year 1900',
                data: [133, 156, 947, 408, 6]
            }, {
                name: 'Year 2008',
                data: [973, 914, 4054, 732, 34]
            }]
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