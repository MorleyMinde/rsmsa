<?php
//interface for models which have offences
interface HasOffence
{
	//Return the JSON with object and offences
	public function getObjectOffencesJSON($offences);
}