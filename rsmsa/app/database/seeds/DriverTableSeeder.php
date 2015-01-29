<?php
class DriverTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('license_number'=>'T64747 ABB','first_name' => 'Vincent','last_name' => 'Minde','gender' => 'M','birthdate' => '2015-01-14','address' => 'P.O. Box 1950 Dar','phone_number' => '+255718026490'),
				array('license_number'=>'T64267 ABB','first_name' => 'Koze','last_name' => 'Jummanne','gender' => 'M','birthdate' => '2015-01-14','address' => 'P.O. Box 1970 Dar','phone_number' => '+255718076490'),
				array('license_number'=>'T683747 ACB','first_name' => 'Paul','last_name' => 'Nyailema','gender' => 'M','birthdate' => '2015-01-14','address' => 'P.O. Box 1150 Dar','phone_number' => '+255718956490'),
		);
		DB::table('rsmsa_drivers')->delete();

		foreach($arrays as $arr)
		{
			Driver::create($arr);
		}
	}
}