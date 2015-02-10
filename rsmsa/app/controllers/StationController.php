<?php
class StationController extends BaseController {
	public function getStation($id)
	{
		return Station::find($id);
	}
}