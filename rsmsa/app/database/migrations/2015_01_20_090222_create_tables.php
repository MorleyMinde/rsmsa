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
		Schema::create('ranks', function($table)
		{
			$table->string('rank_no');
			$table->primary('rank_no');
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('vehicles', function($table)
		{
			$table->string('reg_number');
			$table->primary('reg_number');
			$table->string('make');
			$table->string('type');
		});
		Schema::create('drivers', function($table)
		{
			$table->string('reg_number');
			$table->primary('reg_number');
			$table->string('first_name');
			$table->string('last_name');
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
			$table->string('vehicle_reg_number');
			$table->string('driver_reg_number');
			$table->string('rank_no');
			$table->foreign('vehicle_reg_number')->references('reg_number')->on('vehicles');
			$table->foreign('driver_reg_number')->references('reg_number')->on('drivers');
			$table->foreign('rank_no')->references('rank_no')->on('ranks');
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
