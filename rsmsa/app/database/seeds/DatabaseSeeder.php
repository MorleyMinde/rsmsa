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

		$this->call('OffenceRegistryTableSeeder');
		$this->call('DriverTableSeeder');
		$this->call('StationTableSeeder');
		$this->call('PersonTableSeeder');
		$this->call('PoliceTableSeeder');
		$this->call('VehicleTableSeeder');
		$this->call('OffenceTableSeeder');
		$this->call('OffenceEventTableSeeder');
		$this->call('AppTableSeeder');
	}

}
