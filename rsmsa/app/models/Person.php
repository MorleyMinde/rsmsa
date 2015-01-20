<?php

class Person extends Eloquent{
	
	/**
	 * Returns the User
	 *
	 * @see User Model
	 *
	 * @return Object(User)
	 */
	public function user(){
		return $this->hasOne('User');
	}
}