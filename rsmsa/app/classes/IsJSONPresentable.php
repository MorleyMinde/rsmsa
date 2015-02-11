<?php
/** 
 * @author Vincent P. Minde
 *
 * Interface for an object that can be represented in JSON
 * 
 */
interface IsJSONPresentable
{
	//Sets the object values from json
	public function setValuesByJSON($json);
}