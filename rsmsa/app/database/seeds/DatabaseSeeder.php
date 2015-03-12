<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		
		/*$this->call('OffenceRegistryTableSeeder');
		
		$this->call('DriverTableSeeder');
		$this->call('StationTableSeeder');
		$this->call('PersonTableSeeder');
		$this->call('PoliceTableSeeder');
        $this->call('UsersTableSeeder');
		$this->call('VehicleTableSeeder');
		
//		$this->call('OffenceTableSeeder');
		//$this->call('OffenceEventTableSeeder');

		$this->call('AppTableSeeder');*/

		/*$this->call('UsersTableSeeder');
		$this->call('AppTableSeeder');
		$this->call('VehicleOwnershipSeeder');
		$this->call('LicenceClassesSeeder');*/
		
		$this->call('PoliceTableSeeder');
		$this->call('OffenceRegistryTableSeeder');
	}

}
