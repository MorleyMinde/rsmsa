<<<<<<< HEAD
<?php

class Driver extends Eloquent{

	protected $primaryKey = "license_number";
	public $timestamps = false;
	
	public function offences(){
		return $this->hasMany('Offence');
	}
=======
<?php

class Driver extends Eloquent{

	public $timestamps = false;

    protected $table= 'rsmsa_drivers';

	public function offences(){
		return $this->hasMany('Offence');
	}
>>>>>>> branch 'master' of https://github.com/RSMSA/rsmsa.git
}
