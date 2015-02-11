<?php
/**
 * This is an interface for Models with offences
 * 
 * @author Vincent P. Minde
 *
 */
interface HasOffence
{
	/**
	 * This converts an array of offences to JSON String
	 * @param array $offences
	 * 
	 * @return string
	 */
	public function getObjectOffencesJSON($offences);
}