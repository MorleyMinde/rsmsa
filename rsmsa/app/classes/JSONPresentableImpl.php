<?php
/**
 * 
 * @author Vincent P. Minde
 * 
 * Implementation of a JSON presentable object
 *
 */
class JSONPresentableImpl extends Eloquent implements IsJSONPresentable{
	
	/**
	 * Sets the values of the Model from a json string
	 * 
	 * @param $json
	 */
	public function setValuesByJSON($json){
		foreach($json as $key => $val)
		{
			$this[$key] = $val;
		}
	}
}