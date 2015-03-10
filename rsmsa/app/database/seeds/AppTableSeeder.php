<?php
class AppTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('location' => 'offence'),
				array('location' => 'driver'),
				array('location' => 'accident'),
				array('location' => 'license'),
				array('location' => 'police'),
				array('location' => 'education'),
				array('location' => 'vehicle'),
				array('location' => 'insurance'),
				array('location' => 'account'),
				array('location' => 'payment'),
				array('location' => 'administrative_unit'),
				array('location' => 'user'),
				array('location' => 'configuration'),
		);
		DB::table('rsmsa_apps')->delete();

		foreach($arrays as $arr)
		{
			AppEntity::create($arr);
		}
	}
}