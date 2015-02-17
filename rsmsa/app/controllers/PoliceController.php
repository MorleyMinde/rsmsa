<?php
/**
 * This is the Police controller
 * 
 * @author Vincent P. Minde
 *
 */
class PoliceController extends BaseController {
	/**
	 * Gets a police officer
	 * 
	 * @param string $rank_no
	 */
	public function getPolice($rank_no)
	{
		return Police::where("rank_no","=",$rank_no)->first();
	}
}