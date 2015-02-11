<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/3/2015
 * Time: 2:49 PM
 */

class AccidentWitness extends Eloquent{

    protected $table = 'rsmsa_accident_witness';

    //returns an accident that a witness is involved using an accident id

    public function accident(){

        return $this -> belongsTo('Accident' ,'accident_id');
    }
} 