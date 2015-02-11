<?php
class VehicleTableSeeder extends Seeder{

	public function run()
	{
		$arrays = array(
				array('plate_number' => 'T673 ABD','owner_name' => 'Kidevu Alphonce','nationality' => 'Tanzania','owner_physical_address' => 'Dar Es Salaam', 'owner_address' => 'Kimara-Tanzania', 'make' => 'Toyota','type' => 'Manual','color' => 'Deep Blue','yom' => '1998' , 'chasis_no'=>'AB45667'),
				array('plate_number' => 'T673 ACD','owner_name' => 'Justine Chacha','nationality' => 'Tanzania','owner_physical_address' => 'Mwanza', 'owner_address' => 'Kilimahewa-Mwanza', 'make' => 'Nissan','type' => 'Automatic','color' => 'Black','yom' => '2005' , 'chasis_no'=>'HT5671'),

		);
		DB::table('rsmsa_vehicles')->delete();

		foreach($arrays as $arr)
		{
			Vehicle::create($arr);
		}
	}
}