<?php
class PaymentTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('mode'=>"CASH"),
				array('mode'=>"Tigo-Pesa"),
				array('mode'=>"M-Pesa")
        );
		DB::table('rsmsa_payments')->delete();

		foreach($arrays as $arr)
		{
			Payment::create($arr);
		}
	}
}