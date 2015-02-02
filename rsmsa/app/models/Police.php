<?php
class Police extends Eloquent{

	protected $table = 'rsmsa_police';
	protected $primaryKey = 'rank_no';
	
	public function station(){
		return $this->belongTo('Station');
	}
}