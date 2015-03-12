<?php
/**
 * 
 * @author Vincent P. Minde
 * 
 * This class implments payment
 *
 */
abstract class MobilePayment extends Receipt
{
	/**
	 * The constructor recieves the sms string as the argument
	 * 
	 * @param string $sms
	 */
	public function __construct($sms){
		$this->renderSMS($sms);
	}
	/**
	 * Set the amount
	 * 
	 * @param string $amount
	 */
	protected function setAmount($amount){
		$this->amount = $amount;
	}
	/**
	 * Set the refference number
	 * 
	 * @param string $refNumber
	 */
	protected function setReferenceNumber($refNumber){
		$this->receipt_number = $refNumber;
	}
	/**
	 * Get the amount
	 * 
	 * @return string
	 */
	public function getAmount(){
		return $this->amount;
	}
	/**
	 * Get the refference number which is the reciept number
	 * 
	 * @return string
	 */
	public function getReferenceNumber(){
		return $this->receipt_number;
	}
	/**
	 * Render the sms to provide the amount returned
	 * 
	 * Has to be implemented by the payment mode being made
	 * 
	 * @param string $sms
	 */
	abstract protected function renderSMS($sms);
}