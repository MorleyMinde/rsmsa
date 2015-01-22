<?php
class PersonTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('first_name' => 'Vincent','last_name' => 'Minde','address' => 'P.O. Box 1950 Dar','gender' => 'M','birthdate' => '2015-01-14','phone_number' => '+255718026490','email' => 'vincentminde@gmail.com'),
				array('first_name' => 'Ilakoze','last_name' => 'Jummanne','address' => 'P.O. Box 1960 Dar','gender' => 'M','birthdate' => '2015-01-14','phone_number' => '+255718026491','email' => 'coze@gmail.com'),
				array('first_name' => 'Paul','last_name' => 'Nyailema','address' => 'P.O. Box 1980 Dar','gender' => 'M','birthdate' => '2015-01-14','phone_number' => '+255718026492','email' => 'paulnyailema@gmail.com'),
		);
		DB::table('persons')->delete();

		foreach($arrays as $arr)
		{
			DB::table('persons')->insert($arr);
		}
	}
}