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
/*
 * 
 * These are app routes. Routes for getting app specific information
 */
Route::get('/apps/manifests', function()
{
	$arr = array();
	//Loop through all the apps
	foreach(AppEntity::all() as $app)
	{
		$json = "";
		try{
			//Fetch the manifest.json content from the location
			$json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/apps/".$app->location."/manifest.json"));
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
Route::get('/app/{id}', function($id)
{
	//return View::make('app');
	$app = AppEntity::find($id);
	return View::make("apps/".$app->location."/index");
});
Route::get('/app/{id}/manifest', function($id)
{
	$app = AppEntity::find($id);
	//return json_encode($output, 128);
	return (file_get_contents($_SERVER['DOCUMENT_ROOT']."/apps/".$app->location."/manifest.json"));
});
Route::get('/app/{id}/{file}', function($id,$file)
{
	$app = AppEntity::find($id);
	return Redirect::to("/apps/".$app->location."/".$file);
});
Route::get('/app/{id}/views/{file}', function($id,$file)
{
	$app = AppEntity::find($id);
	return Redirect::to("/apps/".$app->location."/views/".$file);
});
Route::get('/app/{id}/controllers/{file}', function($id,$file)
{
	$app = AppEntity::find($id);
	return Redirect::to("/apps/".$app->location."/controllers/".$file);
});
/*
 * These are routes to api requests
 */
Route::get('/api/request/{tag}', 'AndroidController@processtag');
Route::get('/api/offenceregistry', function()
{
	return OffenceRegistry::all();
});
Route::get('/api/offences', function()
{
	return Offence::all();
});
Route::get('/api/offence/{id}', function($id)
{
	return Offence::find($id);
});

Route::get('/model/vehicle/{plate_number}', function($plate_number)
{
	//return Vehicle::where('plate_number','=',$plate_number)->get();
	return Vehicle::find($plate_number);
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
//Route::post('/api/offence/', function()
//{
//	$request = Request::instance();
//
//    // Now we can get the content from it
//    $content = $request->getContent();
//    $content = '{"name" : "hey",
//				"to" : "",
//				"address" : "",
//				"offences" : [],
//				"place" : "",
//				"facts" : {
//					"a" : "",
//					"b" : "",
//					"c" : "",
//					"d" : ""
//				},
//				"station" : "",
//				"a" : {
//					"name" : "",
//					"residence" : "",
//					"charges" : [],
//					"notification" : ""
//				},
//				"b" : {
//					"name" : "",
//					"residence" : "",
//					"charges" : [],
//					"amount" : ""
//				},
//				"date" : ""
//			}';
//    $json = json_decode($content,true);
//    DB::transaction(function()
//    {
//    	$newOffence = Offence::create([
//    			'to' => $json['name'],
//    			'address' => $json['address'],
//    			'offence_date' => $json['date'],
//    			'place' => $json['place'],
//    			'facta' => $json['facts']['a'],
//    			'factb' => $json['facts']['b'],
//    			'factc' => $json['facts']['c'],
//    			'factd' => $json['facts']['d'],
//    			'vehicle_plate_number' => $json['vehicle_plate_number'],
//    			'driver_license_number' => $json['driver_license_number'],
//    			'rank_no' => $json['rank_no'],
//    			//'amount' => $json['amount'],
//    			//'commit' => $json['commit'],
//    			]);
//    	foreach($json['offences'] as $offence){
//    		$offRegistry = OffenceRegistry::where('section','=',$offence)->get();
//
//    	}
//    	$newOffenceEvent = User::create([
//    			'username' => Input::get('username'),
//    			'account_id' => $newAcct->id,
//    			]);
//    });
//    return $json['name'];
//
//
//});

////////////////////////////////////////////////////////////////////
///////////////////Driver Routes////////////////////////////////////
///////////////////////////////////////////////////////////////////
//getting regions
Route::get('/drivers',array('uses'=>'DriverController@index'));

////////////////////////////////////////////////////////////////////
///////////////////Administrative Unit Routes///////////////////////
///////////////////////////////////////////////////////////////////
//getting regions
//getting kaya
Route::post('/getkaya',array('uses'=>'AdministrativeUnitController@index'));

//getting regions
Route::get('/regions',array('uses'=>'AdministrativeUnitController@getRegions'));

//getting Districts
Route::get('/districts',array('uses'=>'AdministrativeUnitController@getDistricts'));

//adding new kaya
Route::post('/kaya',array('uses'=>'AdministrativeUnitController@store'));

//updating kaya
Route::post('/kaya/{id}',array('uses'=>'AdministrativeUnitController@update'));

//updating kaya distribution status
Route::post('/kaya/{id}/distribute',array('uses'=>'AdministrativeUnitController@updateStatus'));

//getting single kaya Information
Route::get('/kaya/{id}',array('uses'=>'AdministrativeUnitController@show'));

//getting  wards from specific district
Route::get('/wards/district/{id}',array('uses'=>'AdministrativeUnitController@getwardDistricts'));

//getting  villages from specific ward
Route::get('/village/ward/{id}',array('uses'=>'AdministrativeUnitController@getVillageWard'));

//deleting kaya
Route::post('kaya/delete/{id}',array('uses'=>'AdministrativeUnitController@destroy'));

//getting kaya for specific region
Route::get('/kaya/region/{id}',array('uses'=>'AdministrativeUnitController@getregKaya'));

//getting kaya for specific district
Route::get('/kaya/district/{id}',array('uses'=>'AdministrativeUnitController@getdisKaya'));

//getting districts for specific region
Route::get('/districts/region/{id}',array('uses'=>'AdministrativeUnitController@getregDistricts'));

//getting people for specific region
Route::get('/people/region/{id}',array('uses'=>'AdministrativeUnitController@getpeopleInRegion'));

//getting people for specific region
Route::get('/people/village/{id}',array('uses'=>'AdministrativeUnitController@getpeopleInVillage'));

//getting people for specific region
Route::get('/people/ward/{id}',array('uses'=>'AdministrativeUnitController@getpeopleInWard'));

//getting people for specific region
Route::get('/people/district/{id}',array('uses'=>'AdministrativeUnitController@getpeopleInkaya'));


////////////////////////////////////////////////////////////////////////////////
////////////////////////adding organisation units /////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//adding new kaya
Route::post('/region',array('uses'=>'AdministrativeUnitController@storeRegion'));

//adding new kaya
Route::post('/adddistrict/{id}',array('uses'=>'AdministrativeUnitController@storeDistrict'));

//adding new kaya
Route::post('/ddward/{id}',array('uses'=>'AdministrativeUnitController@storeWard'));

//adding new kaya
Route::post('/addvillage/{id}',array('uses'=>'AdministrativeUnitController@storeVillage'));

//getting region details
Route::get('/regiondetails/{id}',array('uses'=>'AdministrativeUnitController@RegionDetails'));


//getting districts details ---- taking regionID ----
Route::get('/districtdetails/{id}',array('uses'=>'AdministrativeUnitController@DistrictDetails'));

//getting wards details ---taking district ID----
Route::get('/warddetails/{id}',array('uses'=>'AdministrativeUnitController@WardDetails'));

//getting village details ---taking ward ID----
Route::get('/villagedetails/{id}',array('uses'=>'AdministrativeUnitController@VillageDetails'));

/////////////////////////////////////////////////////////////////////////
/////////////////////////updating adminstative units////////////////////
////////////////////////////////////////////////////////////////////////
//eddit region
Route::post('/edit/region/{id}',array('uses'=>'AdministrativeUnitController@updateRegion'));

//eddit district
Route::post('/edit/district/{id}',array('uses'=>'AdministrativeUnitController@updateDistrict'));

//eddit ward
Route::post('/edit/ward/{id}',array('uses'=>'AdministrativeUnitController@updateWard'));

//eddit village
Route::post('/edit/village/{id}',array('uses'=>'AdministrativeUnitController@updateVillage'));

//Deleting region
Route::post('/delete/region/{id}',array('uses'=>'AdministrativeUnitController@destroyRegion'));

//Deleting district
Route::post('/delete/district/{id}',array('uses'=>'AdministrativeUnitController@destroyDistrict'));

//Deleting ward
Route::post('/delete/ward/{id}',array('uses'=>'AdministrativeUnitController@destroyWard'));

//Deleting village
Route::post('/delete/village/{id}',array('uses'=>'AdministrativeUnitController@destroyVillage'));


