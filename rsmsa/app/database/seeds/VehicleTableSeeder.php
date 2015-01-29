<?php
class VehicleTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('plate_number' => 'T673 ABD','make' => 'Toyota','type' => 'Low','color' => 'blue'),
				array('plate_number' => 'T673 ACD','make' => 'Toyota','type' => 'High','color' => 'blue'),
		);
		DB::table('rsmsa_vehicles')->delete();

		foreach($arrays as $arr)
		{
			Vehicle::create($arr);
		}
	}
}