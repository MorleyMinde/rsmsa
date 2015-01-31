<?php
class StationTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('name' => 'Kijitonyama')
		);
		DB::table('rsmsa_stations')->delete();

		foreach($arrays as $arr)
		{
			Station::create($arr);
		}
	}
}