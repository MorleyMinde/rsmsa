<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/3/2015
 * Time: 2:48 PM
 */

class AccidentVehicle extends Eloquent{

    protected $table = 'rsmsa_accident_vehicle';

    public function accident(){

        return $this -> belongsTo('Accident' ,'accident_id');
    }

    public function vehicle(){

        return $this -> belongsTo('Vehicle','vehicle_id');
    }
} 