<?php
class Police extends Eloquent{

	protected $table = 'rsmsa_police';

    //returns a station that a police belongs
	public function station(){

		return $this->belongsTo('Station');
	}

    //returns a station that a police belongs
    public function person(){

        return $this->belongsTo('Person');
    }

    //returns accidents that a police has been involved
    public function accident(){

        return $this->hasMany('Accident');
    }
}