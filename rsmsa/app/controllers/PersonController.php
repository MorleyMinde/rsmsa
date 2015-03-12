<?php
/**
 * This is the driver controller
 * 
 * @author Vincent P. Minde
 *
 */
class PersonController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Person::all();
	}

	/**
	 * Get person given the id.
	 *
	 * @return Person
	 */
	public function getPerson($id)
	{
		return Person::find($id);
	}
}
