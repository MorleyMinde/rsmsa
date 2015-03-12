<?php
class Offence extends JSONPresentableImpl{

	/**
	 * Returns the offences registered according to
	 *
	 * @see OffenceRegistry Model
	 *
	 * @return array of OffenceRegistry Object
	 */

    protected $table= 'rsmsa_offences';
	public function offenceRegistries()
	{
		return $this->belongsToMany('OffenceRegistry','rsmsa_offence_events','offence_id','offence_registry_id');
	}
	/**
	 * Returns the vehicle involved in the offence
	 * 
	 * @see Vehicle Model
	 * 
	 * @return Object(Vehicle)
	 */
	public function vehicle()
	{
		return $this->hasOne('Vehicle');
	}
	/**
	 * Returns the driver involved in the offence
	 *
	 * @see Driver Model
	 *
	 * @return Object(Driver)
	 */
	public function driver()
	{
		return $this->hasOne('Driver');
	}
	
	/**
	 * Returns the police involved in issueing an offence
	 *
	 * @see Driver Model
	 *
	 * @return Object(Police)
	 */
	public function police()
	{
		return $this->hasOne('Police');
	}

	/**
	 * Returns list of offences with there amounts calculated involved in issueing an offence
	 *
	 * @see Driver Model
	 * @param $offences
	 * @return Object(Offence)
	 */
	public static function appendAmoutToOffences($offences){
		$offencesRet = array();
		foreach($offences as $offence)
		{
			$total = 0;
			//$receipt = $offence->payment();
			foreach($offence->offenceRegistries as $registry)
			{
				$total += $registry->amount;
			}
			$offence->amount = $total;
			$offenceReceipts = OffenceReceipt::select()->where("offence_id","=",$offence->id)->get();
				if(count($offenceReceipts) == 1)
				{
					
					$offence->receipt = Receipt::where("id","=",$offenceReceipts[0]->receipt_id)->first();//Receipt::find($offenceReceipts[0]->offence_id);
					//echo $offenceReceipts[0]->receipt_id .":".$offence->receipt."<br />";
				}
			
			array_push($offencesRet,$offence);
		}
		return $offencesRet;
	}
	/**
	 * Returns the payment involved in the offence
	 *
	 * @see Receipt Model
	 *
	 * @return Object(Receipt)
	 */
	public function payment()
	{
		$offenceReceipt = OffenceReceipt::where("offence_id","=",$this->id)->first();
		if(empty($offenceReceipt))
			return;
		return Receipt::find($offenceReceipt->receipt_id);
		//return $this->hasMany('Receipt','rsmsa_offence_receipts','offence_id','receipt_id');
	}
}