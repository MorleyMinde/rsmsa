/**
 * 
 * @author Vincent P. Minde
 * 
 */
angular.module('offenceApp')
.controller('offenceReportController',
	function($scope,$http) {
		//Initialize regions
		$scope.regions = [];
		//Fetch regions from server
		$http.get("/regions").success(function(data){
			$scope.regions = data;
		}).error(function(error) {
			alert(error);
		});
		//Initialize districts
		$scope.districts = [];
		//Fetch districts from server
		$http.get("/districts").success(function(data){
			$scope.districts = data;
		}).error(function(error) {
			alert(error);
		});
		//Initialize date options for ui-date
		$scope.dateOptions = {
	        changeYear: true,
	        changeMonth: true,
	        yearRange: '1900:-0'
	    };
		//Initialize list to show
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
		//Initialize gender list
		$scope.genders = [
		                  {id:"all",name:"All"},
		                  {id:"M",name:"Male"},
		                  {id:"F",name:"Female"}
		             ];
		//Initializing list of horizontal dimention
		$scope.horizontal = [
		                     {id:"dates",name:"Date Range"},
		                     {id:"year",name:"Year"},
		                     {id:"years",name:"Year Range"},
		                     {id:"age",name:"Age Range"}
		             ];
		//Initialize list of years
		$scope.years = [];
		//Add years to the years scope from 1970 to 2015
		for(i = 1970;i < 2016;i++){
			$scope.years.push({id:i,name:i});
		}
		//Initialize list of age ranges
		$scope.ageRange = [];
		//Add age range from 2 to 11
		for(i = 2;i < 11;i++){
			$scope.ageRange.push({id:i,name:i});
		}
		//Initialize report criteria
		$scope.criteria = {
				show :"",
				horizontal :"",
				gender :"",
				year:"",
				startYear:"",
				endYear:"",
				ageRange:"",
				startDate:Date(),
				endDate:Date(),
				regions:[],
				districts:[]
		};
		//Initialize results which will be shown on the charts 
		$scope.results = null;
		/**
		 * 
		 * Fetches report from server
		 * 
		 */
		$scope.tableReport = function(){
			$http.post("/api/offence/report",$scope.criteria).success(function(data){
				$scope.results = data;
			}).error(function(error) {
				alert(error);
			});
		}
		/**
		 * Watch and wait for a model change and fetch from a url and execute
		 * on success
		 * 
		 * @param string model
		 * 
		 * @param string url(Url to fetch the data)
		 * 
		 * @param function success (To execute after success fetch)
		 */
		$scope.watchAndFetch = function(model,url,success){
			$scope.$watch(model, function (value, oldValue) {
				
				if(value != '')//If the changed value is not empty
				{
					//Fetch station information given the station_id
					$http.get(url + value).success(
							function(data) {
								success(data);
							})
					.error(function(error) {
						alert(error);
						$scope.data.error = error;
					});
				}
			});
		}
		$scope.$watch("criteria.regions", function (value, oldValue) {
			
			if(value != '')//If the changed value is not empty
			{
				var districts = [];
				for(i = 0;i < value.length;i++){
					for(j = 0;j < $scope.districts.length;j++){
						if($scope.districts[j].region_id == value[i])
						{
							districts.push($scope.districts[j]);
						}
					}
				}
				$scope.regdistricts = districts;
			}
		});
		/**
		 * 
		 * Determines whether an element can be displayed or not
		 * 
		 * @param boolean val
		 * 
		 * @return string
		 */
		$scope.display = function(val){
			if(val){
				return "block";
			}else
			{
				return "none";
			}
		};
});