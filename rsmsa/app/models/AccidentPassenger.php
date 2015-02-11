<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/3/2015
 * Time: 2:50 PM
 */

class AccidentPassenger extends Eloquent{

protected $table = 'rsmsa_accident_passenger';

    //returns an accident that a passenger is involved using an accident id

    public function accident(){

        return $this -> belongsTo('Accident' ,'accident_id');
    }
} 