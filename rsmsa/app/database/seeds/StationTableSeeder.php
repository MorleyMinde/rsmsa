<?php
class StationTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('name' => 'Kijitonyama')
		);
		DB::table('stations')->delete();

		foreach($arrays as $arr)
		{
			Station::create($arr);
		}
	}
}