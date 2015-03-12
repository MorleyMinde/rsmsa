/**
 * Payment Mode controller to show all the payment modes in the system
 * 
 * @author Vincent P. Minde
 * 
 */
angular.module('rsmsaApp').controller('paymentModeController',function($scope,$http) {
		//Initialize payments
		$scope.payments = {};
		//Fetch payment
		$http.get("/api/payment").success(function(data) {
			$scope.payments = data;
			
		}).error(function(error) {
			//TODO Handle Error
		});
});