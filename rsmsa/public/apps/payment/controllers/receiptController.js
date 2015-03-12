/**
 * Receipt controller to show all the payment modes in the system
 * 
 * @author Vincent P. Minde
 * 
 */
angular.module('rsmsaApp').controller('receiptController',function($scope,$http) {
		//Initialize payments
		$scope.receipt = {
				receipt_number :"",
				amount :"",
				payment_mode :""
		};
		//Initialize payments
		$scope.payments = {};
		//Fetch payment
		$http.get("/api/payment").success(function(data) {
			$scope.payments = data;
			
		}).error(function(error) {
			//TODO Handle Error
		});
		$scope.submitReceipt = function(){
			
			
			$http.post("/api/payment/receipt",$scope.receipt).success(function(data) {
				//$scope.payments = data;
				if($scope.hide != undefined){
					$scope.hide();
				}
			}).error(function(error) {
				//TODO Handle Error
			});
		}
});