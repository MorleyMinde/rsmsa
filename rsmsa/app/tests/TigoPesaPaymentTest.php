<?php
/**
 * 
 * @author Vincent P. Minde
 * 
 * This class implements tigo pesa payment
 *
 */
class TigoPesaPaymentTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testSMSsent()
	{
		$amount = "3,000";
		$refNumber ="PP140821.1336.F02587";
		$sms = "Salio jipya ni Tsh 3,011. Umepokea Tsh $amount kutoka kwa VINCENT MINDE, 0718026490. 21/08/2014 01:36 PM, kumbukumbu no. $refNumber. Hamisha Pesa kutoka NMB, CRDB, NBC kuingia Tigopesa urudishiwe muda wa maongezi wa Tshs 1000 kupiga mitandao yote.";
		$payment = new TigoPesaPayment($sms);
		$this->assertEquals($amount,$payment->getAmount());
		$this->assertEquals($refNumber,$payment->getReferenceNumber());
	}
	
}