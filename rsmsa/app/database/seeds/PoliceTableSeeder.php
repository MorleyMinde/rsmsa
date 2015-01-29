<?php
class PoliceTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('rank_no'=>'R6478','station_id' => '1','person_id' => '1'),
				array('rank_no'=>'R6488','station_id' => '1','person_id' => '2'),
				array('rank_no'=>'R6278','station_id' => '1','person_id' => '3'),
                array('rank_no'=>'R111','station_id' => '1','person_id' => '4'),
		);
		DB::table('rsmsa_police')->delete();

		foreach($arrays as $arr)
		{
			Police::create($arr);
		}
	}
}