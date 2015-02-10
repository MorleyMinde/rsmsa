<?php
class PoliceController extends BaseController {
	public function getPolice($rank_no)
	{
		return Police::find($rank_no);
	}
}