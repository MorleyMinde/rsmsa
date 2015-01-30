<?php
class Police extends Eloquent{

	protected $primaryKey = 'rank_no';
	protected $table = 'police';
	
	public function station(){
		return $this->belongTo('Station');
	}
}