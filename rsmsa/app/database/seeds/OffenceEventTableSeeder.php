<?php
class OffenceEventTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('offence_id'=>'1','offence_registry_id' => '1'),
				array('offence_id'=>'1','offence_registry_id' => '2'),
				array('offence_id'=>'1','offence_registry_id' => '3'),
				array('offence_id'=>'2','offence_registry_id' => '1'),
				array('offence_id'=>'3','offence_registry_id' => '2'),
		);
		DB::table('rsmsa_offence_events')->delete();

		foreach($arrays as $arr)
		{
			OffenceEvent::create($arr);
		}
	}
}