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
				array('location' => 'user'),
		);
		DB::table('apps')->delete();

		foreach($arrays as $arr)
		{
			AppEntity::create($arr);
		}
	}
}