<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/3/2015
 * Time: 10:59 AM
 */

class AccidentDriver extends Eloquent{

    protected $table = 'rsmsa_accident_driver';

    public function accident(){

        return $this -> belongsTo('Accident' ,'accident_id');
    }

    public function driver(){

        return $this -> belongsTo('Driver' ,'driver_id');
    }

} 