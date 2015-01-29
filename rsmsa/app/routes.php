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

Route::get('/', function()
{
	
	return View::make('index')->with('apps',AppEntity::all());
});
Route::get('/apps/manifests', function()
{
	$arr = array();
	//Loop through all the apps
	foreach(AppEntity::all() as $app)
	{
		$json = "";
		try{
			//Fetch the manifest.json content from the location
			$json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/".$app->location."/manifest.json"));
			//add the id of the app to the manifest
			$json->id = $app->id;
		}catch(Exception $e){
			continue;
		}
		array_push($arr,$json);
	}
	//Encode to json
	return json_encode($arr);
});
Route::get('/app/{id}', function()
{
	return View::make('app');
});
Route::get('/app/{id}/manifest', function($id)
{
	$app = AppEntity::find($id);
	//return json_encode($output, 128);
	return (file_get_contents($_SERVER['DOCUMENT_ROOT']."\\".$app->location."\manifest.json"));
});
Route::get('/app/{id}/{file}', function($id,$file)
{
	$app = AppEntity::find($id);
	return Redirect::to("/".$app->location."/".$file);
});
Route::get('/app/{id}/views/{file}', function($id,$file)
{
	$app = AppEntity::find($id);
	return Redirect::to("/".$app->location."/views/".$file);
});
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
    //$content = $request->getContent();
    $content = '{"name" : "hey",
				"to" : "",
				"address" : "",
				"offences" : [],
				"place" : "",
				"facts" : {
					"a" : "",
					"b" : "",
					"c" : "",
					"d" : ""
				},
				"station" : "",
				"a" : {
					"name" : "",
					"residence" : "",
					"charges" : [],
					"notification" : ""
				},
				"b" : {
					"name" : "",
					"residence" : "",
					"charges" : [],
					"amount" : ""
				},
				"date" : ""
			}';
    $json = json_decode($content,true);
    DB::transaction(function()
    {
    	$newOffence = Offence::create([
    			'to' => $json['name'],
    			'address' => $json['address'],
    			'offence_date' => $json['date'],
    			'place' => $json['place'],
    			'facta' => $json['facts']['a'],
    			'factb' => $json['facts']['b'],
    			'factc' => $json['facts']['c'],
    			'factd' => $json['facts']['d'],
    			'vehicle_plate_number' => $json['vehicle_plate_number'],
    			'driver_license_number' => $json['driver_license_number'],
    			'rank_no' => $json['rank_no'],
    			//'amount' => $json['amount'],
    			//'commit' => $json['commit'],
    			]);
    	foreach($json['offences'] as $offence){
    		$offRegistry = OffenceRegistry::where('section','=',$offence)->get();
    		
    	}
    	$newOffenceEvent = User::create([
    			'username' => Input::get('username'),
    			'account_id' => $newAcct->id,
    			]);
    });
    return $json['name'];
});


