<?php
/**
 * This is the station Controller
 * 
 * @author Vincent P. Minde
 *
 */
class StationController extends BaseController {
	/**
	 * Get the station
	 * 
	 * @param int|string $id
	 */
	public function getStation($id)
	{
		return Station::find($id);
	}
}