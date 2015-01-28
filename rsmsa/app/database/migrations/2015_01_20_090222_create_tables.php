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

		Schema::create('persons', function($table)
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
			
			
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username', 128)->unique();
			$table->string('password', 60);
			$table->string('level',128);
			$table->string('remember_token',100)->nullable();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('stations', function($table)
		{
			$table->increments('id');
			$table->string('name',128);
			$table->timestamps();
		});
		Schema::create('police', function($table)
		{
			$table->string('rank_no');
			$table->primary('rank_no');
			$table->integer('station_id')->unsigned();
			$table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('vehicles', function($table)
		{
			$table->string('plate_number');
			$table->primary('plate_number');
			$table->string('make');
			$table->string('type');
			$table->string('color');
		});
		Schema::create('drivers', function($table)
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
		Schema::create('offence_registry', function($table)
		{
			$table->increments('id');
			$table->text('nature');
			$table->string('section');
			$table->timestamps();
		});
		Schema::create('offences', function($table)
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
			$table->foreign('vehicle_plate_number')->references('plate_number')->on('vehicles');
			$table->foreign('driver_license_number')->references('license_number')->on('drivers');
			$table->foreign('rank_no')->references('rank_no')->on('police');
			$table->timestamps();
		});
		Schema::create('offence_events', function($table)
		{
			$table->integer('offence_id')->unsigned();
			$table->integer('offence_registry_id')->unsigned();
			$table->primary(array('offence_id','offence_registry_id'));
			$table->foreign('offence_id')->references('id')->on('offences');
			$table->foreign('offence_registry_id')->references('id')->on('offence_registry');
		});
		Schema::create('apps', function($table)
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
		Schema::drop('persons');
		Schema::drop('users');
		Schema::drop('ranks');
		Schema::drop('vehicles');
		Schema::drop('drivers');
		Schema::drop('offence_registry');
		Schema::drop('offences');
		Schema::drop('offence_events');
	}

}
