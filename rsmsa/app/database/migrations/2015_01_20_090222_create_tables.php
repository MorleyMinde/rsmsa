<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('rsmsa_persons', function($table)
		{
			$table->increments('id');
			$table->string('first_name', 128);
			$table->string('last_name');
			$table->string('address');
			$table->string('gender');
			$table->date('birthdate');
			$table->string('phone_number')->unique();
			$table->string('email')->unique();
			$table->timestamps();
		});
			
			
		Schema::create('rsmsa_users', function($table)
		{
			$table->increments('id');
			$table->string('username', 128)->unique();
			$table->string('password', 60);
			$table->string('level',128);
			$table->string('remember_token',100)->nullable();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('rsmsa_persons')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('rsmsa_stations', function($table)
		{
			$table->increments('id');
			$table->string('name',128);
			$table->timestamps();
		});
		Schema::create('rsmsa_police', function($table)
		{
			$table->string('rank_no');
			$table->primary('rank_no');
			$table->integer('station_id')->unsigned();
			$table->foreign('station_id')->references('id')->on('rsmsa_stations')->onDelete('cascade');
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('rsmsa_persons')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('rsmsa_vehicles', function($table)
		{
			$table->string('plate_number');
			$table->primary('plate_number');
			$table->string('make');
			$table->string('type');
			$table->string('color');
		});
		Schema::create('rsmsa_drivers', function($table)
		{
			$table->string('license_number');
			$table->primary('license_number');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('address');
			$table->string('gender');
			$table->date('birthdate');
			$table->string('phone_number')->unique();
		});
		Schema::create('rsmsa_offence_registry', function($table)
		{
			$table->increments('id');
			$table->text('nature');
			$table->string('section');
			$table->timestamps();
		});
		Schema::create('rsmsa_offences', function($table)
		{
			$table->increments('id');
			$table->string('to');
			$table->string('address');
			$table->date('offence_date');
			$table->string('place');
			$table->string('facta');
			$table->string('factb');
			$table->string('factc');
			$table->string('factd');
			$table->string('vehicle_plate_number');
			$table->string('driver_license_number');
			$table->string('rank_no');
			$table->string('amount');
			$table->string('commit');
			$table->string('latitude');
			$table->string('longitude');
			$table->foreign('vehicle_plate_number')->references('plate_number')->on('rsmsa_vehicles');
			$table->foreign('driver_license_number')->references('license_number')->on('rsmsa_drivers');
			$table->foreign('rank_no')->references('rank_no')->on('rsmsa_police');
			$table->timestamps();
		});
		Schema::create('rsmsa_offence_events', function($table)
		{
			$table->integer('offence_id')->unsigned();
			$table->integer('offence_registry_id')->unsigned();
			$table->primary(array('offence_id','offence_registry_id'));
			$table->foreign('offence_id')->references('id')->on('rsmsa_offences');
			$table->foreign('offence_registry_id')->references('id')->on('rsmsa_offence_registry');
		});
		Schema::create('rsmsa_apps', function($table)
		{
			$table->increments('id');
			$table->string('location');
		});
			
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('rsmsa_apps');
        Schema::drop('rsmsa_stations');
		Schema::drop('rsmsa_persons');
		Schema::drop('rsmsa_users');
		Schema::drop('rsmsa_police');
		Schema::drop('rsmsa_vehicles');
		Schema::drop('rsmsa_drivers');
		Schema::drop('rsmsa_offence_registry');
		Schema::drop('rsmsa_offences');
		Schema::drop('rsmsa_offence_events');
	}

}
