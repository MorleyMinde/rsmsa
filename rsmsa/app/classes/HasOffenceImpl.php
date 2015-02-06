<?php

class HasOffenceImpl extends Eloquent implements HasOffence
{
	public function getObjectOffencesJSON($offences){
		$arr = array();
		array_push($arr,array(strtolower(get_class($this))=>$this));
		array_push($arr,array('offences'=>$offences));
		return $this->getJSON($arr);
	}
	//Converts array to json
	public function getJSON($data)
	{
		$output = array();
		foreach($data as $v) {
			$output[key($v)] = current($v);
		}
		return json_encode($output, 128);
	}
}