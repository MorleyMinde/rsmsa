<?php
/**
 * 
 * @author Vincent P. Minde
 * 
 * This class implements tigo pesa payment
 *
 */
class TigoPesaPayment extends MobilePayment
{
	/** 
	 * Render the sms recieved to get the refference number and the amount paid
	 * 
	 * @param unknown $sms
	 */
	protected function renderSMS($sms){
		//Initialize amount array
		$amount = array();
		//Fetch the amount from the sms and put the values in the amount array
		preg_match('/Umepokea\W+Tsh\W*([\d\,\.]*\d)/', $sms, $amount);
		/**
		 * Set the amount made in the mobile payment which is the second 
		 * element of the array since the first is the matching string
		 */
		$this->setAmount($amount[1]);
		
		//Initialize refference number array
		$refNumber = array();
		//Fetch the refference number from the sms and put the values in the refNumber array
		preg_match('/kumbukumbu no\W+(\w{8}\.\d{4}\.\w{5,}\b)/', $sms, $refNumber);
		/**
		 * Set the refference number made in the mobile payment which is the second
		 * element of the array since the first is the matching string
		 */
		$this->setReferenceNumber($refNumber[1]);
	}
}