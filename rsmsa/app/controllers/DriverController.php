<?php

class DriverController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Driver::all();
	}
	public function getOffences($license_number){
		$driver = Driver::find($license_number);
		return appendAmoutToOffences($driver->offences);
	}
	public function getPaidOffences($license_number){
		$driver = Driver::find($license_number);
		return Offence::appendAmoutToOffences($driver->paidOffences);
	}
	public function getNotPaidOffences($license_number){
		$driver = Driver::find($license_number);
		return Offence::appendAmoutToOffences($driver->notPaidOffences);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Driver::create(Input::all());
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Driver::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function getDriver($license_number)
    {
        return Driver::find($license_number);

    }
}
