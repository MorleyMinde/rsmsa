<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceStationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('police_stations', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');
            $table->string('coordinate');
            $table->string('contacts');
            $table->string('Address');
            $table->text('Contact Person');
            $table->integer('ward_id');
            $table->integer('district_id');
            $table->integer('region_id');
            $table->integer('village_id');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('police_stations');
	}

}
