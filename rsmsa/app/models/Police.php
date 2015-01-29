<?php
class Police extends Eloquent{

	protected $table = 'rsmsa_police';
	
	public function station(){
		return $this->belongTo('Station');
	}
}