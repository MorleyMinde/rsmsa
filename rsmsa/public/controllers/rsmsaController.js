angular.module('rsmsaApp', ['ngMaterial',"highcharts-ng"])
.controller('AppCtrl', function($scope, $http, $mdDialog) {
	$scope.apps = {};
	//Gets manifests of all apps registered
	$http.get("/apps/manifests").success(function(data) {
		$scope.apps = data;
	}).error(function(error) {
		alert(error);
		$scope.data.error = error;
	});
	//Initialize user model
	$scope.user = {};
	//Gets logged in user
	$http.get("/logged/user/").success(function(data) {
		$scope.user = data;
	}).error(function(error) {
		alert(error);
		$scope.data.error = error;
	});
	
	$scope.passwordState ="";
	//Initialize password model
	$scope.cpassword = {
			"current_password":"",
			"new_password":"",
			"repeat_new_password":""
		};
	//Change the user password
	$scope.changePassword = function(){
		$http.post("/change/password",$scope.cpassword).success(function(data) {
			alert(data);
			$scope.passwordState = "Password was change successfully";
			$scope.cpassword.current_password = "";
			$scope.cpassword.new_password = "";
			$scope.cpassword.repeat_new_password = "";
			
		}).error(function(json) {
			$scope.passwordState = json.error.message;
		});
	}
	
	$scope.dashboard = true;
	$scope.showApp = false;
	$scope.profile = false;
	$scope.password = false;
	$scope.showPanel = function(val){
		$scope.showApp = (val == 'app');
		$scope.dashboard = (val == 'dashboard');
		$scope.profile = (val == 'profile');
		$scope.password = (val == 'password');
	};
	//drawing some charts
    $scope.chartConfig = {
        title: {
            text: 'Offence Summary Chart'
        },
        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
        },
        labels: {
            items: [{
                html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'Jane',
            data: [3, 2, 1, 3, 4]
        }, {
            type: 'column',
            name: 'John',
            data: [2, 3, 5, 7, 6]
        }, {
            type: 'column',
            name: 'Joe',
            data: [4, 3, 3, 9, 0]
        }, {
            type: 'spline',
            name: 'Average',
            data: [3, 2.67, 3, 6.33, 3.33],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Total consumption',
            data: [{
                name: 'Jane',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'John',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }, {
                name: 'Joe',
                y: 19,
                color: Highcharts.getOptions().colors[2] // Joe's color
            }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        	
        }],
        chart: {
            backgroundColor: '#FCFFC5',
            polar: true,
            type: 'line'
        }
    };
  //drawing some charts
    $scope.chartConfig1 = {
        title: {
            text: 'Male Female Offence Summary Chart'
        },
        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
        },
        labels: {
            items: [{
                html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'Jane',
            data: [3, 2, 1, 3, 4]
        }, {
            type: 'column',
            name: 'John',
            data: [2, 3, 5, 7, 6]
        }, {
            type: 'column',
            name: 'Joe',
            data: [4, 3, 3, 9, 0]
        }, {
            type: 'spline',
            name: 'Average',
            data: [3, 2.67, 3, 6.33, 3.33],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Total consumption',
            data: [{
                name: 'Jane',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'John',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }, {
                name: 'Joe',
                y: 19,
                color: Highcharts.getOptions().colors[2] // Joe's color
            }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        	
        }],
        chart: {
            backgroundColor: '#FCFFC5',
            polar: true,
            type: 'line'
        }
    };
  //drawing some charts
    $scope.chartConfig2 = {
        title: {
            text: 'Accident Summary Chart'
        },
        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
        },
        labels: {
            items: [{
                html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'Jane',
            data: [3, 2, 1, 3, 4]
        }, {
            type: 'column',
            name: 'John',
            data: [2, 3, 5, 7, 6]
        }, {
            type: 'column',
            name: 'Joe',
            data: [4, 3, 3, 9, 0]
        }, {
            type: 'spline',
            name: 'Average',
            data: [3, 2.67, 3, 6.33, 3.33],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Total consumption',
            data: [{
                name: 'Jane',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'John',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }, {
                name: 'Joe',
                y: 19,
                color: Highcharts.getOptions().colors[2] // Joe's color
            }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        	
        }],
        chart: {
            backgroundColor: '#FCFFC5',
            polar: true,
            type: 'line'
        }
    };
	//Open the app with a dialog animation
	$scope.openApp = function(ev,appId){
		
		$mdDialog.appId = appId;
		$mdDialog.show({
		      controller: DialogController,
		      templateUrl: '/views/app.html',
		      targetEvent: ev,
		    })
		    .then(function(answer) {
		      $scope.alert = 'You said the information was "' + answer + '".';
		    }, function() {
		      $scope.alert = 'You cancelled the dialog.';
		    });
	}
});
function DialogController($scope, $mdDialog) {
	$scope.getIframeSrc = function () {
		  return '/app/' + $mdDialog.appId +"/";
	};
	  $scope.hide = function() {
	    $mdDialog.hide();
	  };
	  $scope.cancel = function() {
	    $mdDialog.cancel();
	  };
	  $scope.back = function() {
	    $mdDialog.hide();
	  };
	}