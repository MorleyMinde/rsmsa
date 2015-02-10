<?php
class StationTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('name' => 'Kijitonyama',
                      'district' => 'Kinondoni',
                      'region' => 'Dar Es Salaam')
		);
		DB::table('rsmsa_stations')->delete();

		foreach($arrays as $arr)
		{
			Station::create($arr);
		}
	}
}