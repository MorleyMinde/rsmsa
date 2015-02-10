<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/3/2015
 * Time: 10:57 AM
 */

class Accident extends Eloquent{

    protected $table = 'rsmsa_accidents' ;

    //returns a police involved in reporting an accident
    public function police()
    {
        return $this->hasOne('Police');
    }

    //returns driver(s) associated with the accident using an accident_id

    public function drivers(){

        return $this -> hasMany('AccidentDriver', 'accident_id');
    }


    //returns vehicle(s) associated with the accident using an accident_id
    public function vehicle(){

        return $this -> hasMany('AccidentVehicle', 'accident_id');
    }

    //returns passenger(s) associated with the accident using an accident_id
    public function passenger(){

        return $this -> hasMany('AccidentVehicle', 'accident_id');
    }

    //returns witness(s) associated with the accident using an accident_id
    public function witness(){

        return $this -> hasMany('AccidentVehicle', 'accident_id');
    }
}