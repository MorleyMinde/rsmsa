angular.module('offenceApp').controller('offenceReportController',function($scope,$http) {
		$scope.dateOptions = {
	        changeYear: true,
	        changeMonth: true,
	        yearRange: '1900:-0'
	    };
		$scope.show = [
		                  {id:"general",name:"General"},
		                  {id:"regions",name:"Regions"},
		                  {id:"districts",name:"Districts"},
		                  {id:"vehicle",name:"Vehicle Type"},
		                  {id:"nature",name:"Offence Nature"},
		                  {id:"section",name:"Offence Section"},
		                  {id:"relating",name:"Offence Relating"},
		                  {id:"amount",name:"Amount Paid"},
		                  {id:"license",name:"License Status"},
		                  {id:"gender",name:"Gender"}
		             ];
		$scope.genders = [
		                  {id:"all",name:"All"},
		                  {id:"M",name:"Male"},
		                  {id:"F",name:"Female"}
		             ];
		$scope.horizontal = [
		                     {id:"dates",name:"Date Range"},
		                     {id:"year",name:"Year"},
		                     {id:"years",name:"Year Range"},
		                     {id:"age",name:"Age Range"}
		             ];
		
		$scope.years = [];
		for(i = 1970;i < 2016;i++){
			$scope.years.push({id:i,name:i});
		}
		$scope.ageRange = [];
		for(i = 2;i < 11;i++){
			$scope.ageRange.push({id:i,name:i});
		}
		$scope.criteria = {
				show :"",
				horizontal :"",
				gender :"",
				year:"",
				startYear:"",
				endYear:"",
				ageRange:"",
				startDate:Date(),
				endDate:Date()
		};
		$scope.results = null;
		$scope.tableReport = function(){
			$http.post("/api/offence/report",$scope.criteria).success(function(data){
				$scope.results = data;
			}).error(function(error) {
				alert(error);
			});
		}
		$scope.display = function(val){
			if(val){
				return "block";
			}else
			{
				return "none";
			}
		};
});