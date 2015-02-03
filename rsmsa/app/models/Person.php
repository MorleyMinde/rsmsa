<?php

class Person extends Eloquent{
	
	/**
	 * Returns the User
	 *
	 * @see User Model
	 *
	 * @return Object(User)
	 */

    protected $table = 'rsmsa_persons' ;
	public function user(){
		return $this->hasOne('User');
	}
}