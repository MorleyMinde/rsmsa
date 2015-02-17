<?php
/**
 * 
 * @author Vincent P. Minde
 * 
 * This class implements the HasOffence Interface
 *
 */
class HasOffenceImpl extends Eloquent implements HasOffence
{
	/**
	 * 
	 * @param array $offences
	 * 
	 * Returns a json string
	 * 
	 * @return string
	 */
	public function getObjectOffencesJSON($offences){
		$arr = array();
		
		//Convert class name to lower case to
		array_push($arr,array(strtolower(get_class($this))=>$this));
		array_push($arr,array('offences'=>$offences));
		return $this->getJSON($arr);
	}
	/**
	 * Helper to convert array to json
	 * 
	 * @param array $data
	 * 
	 * Returns a json string
	 * @return string
	 */
	public function getJSON($data)
	{
		$output = array();
		foreach($data as $v) {
			$output[key($v)] = current($v);
		}
		return json_encode($output, 128);
	}
}