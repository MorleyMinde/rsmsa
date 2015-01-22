<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::get('/api/request/{tag}', 'AndroidController@processtag');
Route::get('/offenceregistry', function()
{
	return OffenceRegistry::all();
});Route::get('/model/vehicle/{plate_number}', function($plate_number)
{
	return Vehicle::where('plate_number','=',$plate_number)->get();
	
});
Route::get('/model/police/{rank_no}', function($rank_no)
{
	$police = Police::where('rank_no','=',$rank_no)->get();
	if(count($police) == 0)
	{
		return "[]";
	}
	$police->push(Station::find($police[0]['station_id']));
	return $police;

});
Route::get('/model/driver/{license_number}', function($license_number)
{
	return Driver::where('license_number','=',$license_number)->get();

});
Route::post('/api/offence/', function()
{
	$request = Request::instance();

    // Now we can get the content from it
    $content = $request->getContent();

    return $content[name];
});


