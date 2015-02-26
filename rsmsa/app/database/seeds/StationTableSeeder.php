<?php
class StationTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('name' => 'Kijitonyama',
                      'district_id' => '8',
                      'region_id' => '2')
		);
		DB::table('rsmsa_stations')->delete();

		foreach($arrays as $arr)
		{
			Station::create($arr);
		}
	}
}