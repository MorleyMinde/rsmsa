<?php
class Police extends Eloquent{

	protected $table = 'police';
	
	public function station(){
		return $this->belongTo('Station');
	}
}