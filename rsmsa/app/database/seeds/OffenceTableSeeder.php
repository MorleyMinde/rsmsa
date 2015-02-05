<?php
class OffenceTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('to'=>'Ilakoze Jumanne','address' => 'Box 19521','offence_date' => '2015-01-14','place' => 'Dar','vehicle_plate_number' => 'T673 ABD','driver_license_number' => 'T64267 ABB','rank_no' => 'R6278','admit' => true,'paid' => true,'latitude' => '1.028','longitude' => "30"),
				array('to'=>'Ilakoze Jumanne','address' => 'Box 19521','offence_date' => '2015-01-14','place' => 'Dar','vehicle_plate_number' => 'T673 ABD','driver_license_number' => 'T64267 ABB','rank_no' => 'R6278','admit' => false,'paid' => false,'latitude' => '1.028','longitude' => "30"),
				array('to'=>'Vincent Minde','address' => 'Box 19521','offence_date' => '2015-01-14','place' => 'Dar','vehicle_plate_number' => 'T673 ABD','driver_license_number' => 'T64747 ABB','rank_no' => 'R6278','admit' => true,'paid' => false,'latitude' => '1.028','longitude' => "30"),
		);
		DB::table('rsmsa_offences')->delete();

		foreach($arrays as $arr)
		{
			Offence::create($arr);
		}
	}
}