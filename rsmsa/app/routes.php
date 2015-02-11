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


Route::get('/', array('before' => 'auth' , 'uses' => 'LoginController@index'));

Route::get('login', array('uses'=>'LoginController@getLogin'));
Route::get('logout', array('uses'=>'LoginController@logout'));
//process login form
Route::post('login', array('uses'=>'LoginController@login'));
/*
 * 
 * These are app routes. Routes for getting app specific information
 */
Route::get('/apps/manifests', 'AppController@getManifests');
Route::get('/app/{id}', 'AppController@getApp');
Route::get('/app/{id}/manifest', 'AppController@getManifest');
Route::get('/app/{id}/{file}','AppController@getFile' );
Route::get('/app/{id}/views/{file}', 'AppController@getView');
Route::get('/app/{id}/controllers/{file}', 'AppController@getController');
/*
 * These are routes to api requests
 */
Route::get('/api/request/{tag}', 'AndroidController@processtag');


//Vehicle Controller Rooutes
Route::get('/api/vehicle/{plate_number}', "VehicleController@getVehicle");
Route::get('/api/vehicle/{plate_number}/offences', "VehicleController@getOffences");
Route::get('/api/vehicle/{plate_number}/offences/paid', "VehicleController@getPaidOffences");
Route::get('/api/vehicle/{plate_number}/offences/notpaid', "VehicleController@getNotPaidOffences");

//Police Controller Rooutes
Route::get('/api/police/{rank_no}', "PoliceController@getPolice");

////////////////////////////////////////////////////////////////////
///////////////////Driver Routes////////////////////////////////////
///////////////////////////////////////////////////////////////////
//getting drivers
Route::get('/drivers',array('uses'=>'DriverController@index'));

//getting drivers
Route::post('/driver/upload',array('uses'=>'DriverController@upload'));

////////////////////////////////////////////////////////////////////
///////////////////Administrative Unit Routes///////////////////////
///////////////////////////////////////////////////////////////////
//getting regions
//getting kaya
Route::post('/getkaya',array('uses'=>'AdministrativeUnitController@index'));

//getting regions
Route::get('/regions',array('uses'=>'AdministrativeUnitController@getRegions'));

Route::get('/countries',array('uses'=>'AdministrativeUnitController@getCountries'));

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

//Station Controller Rooutes
Route::get('/api/station/{id}', "StationController@getStation");
//Driver Controller Rooutes
Route::get('/api/driver/{license_number}', "DriverController@getDriver");
Route::get('/api/driver/{license_number}/offences', "DriverController@getOffences");
Route::get('/api/driver/{license_number}/offences/paid', "DriverController@getPaidOffences");
Route::get('/api/driver/{license_number}/offences/notpaid', "DriverController@getNotPaidOffences");

//Offence Controller Rooutes
Route::get('/api/offence/registry', "OffenceController@getOffenceRegistry");
Route::post('/api/offence/report', "OffenceController@getReport");
Route::post('/api/offence/stats', "OffenceController@getStats");
Route::get('/api/offence/registry/{id}/offences', "OffenceController@getOffenceRegistryOffences");
Route::get('/api/offence/{id}', "OffenceController@getOffence");

Route::get('/api/offences', "OffenceController@getOffences");
Route::post('/api/offence/', "OffenceController@processOffencePost");
Route::get('/api/offence/{id}/events/', "OffenceController@getEvents");
Route::get('/api/offence/{id}/delete/', "OffenceController@delete");

Route::post('/api/accident/', array('uses' => 'AccidentController@submitAccident'));

Route::get('/api/accidents/', array('uses' => 'AccidentController@getAccidents'));

Route::get('/api/accident/{accident_id}', array('uses' => 'AccidentController@viewAccident'));

Route::get('/api/accident/driver/{driver_id}', array('uses' => 'AccidentController@getDriver'));

Route::get('/api/accident/vehicle/{vehicle_id}', array('uses' => 'AccidentController@getVehicle'));

Route::get('/accident/police/{rank_no}', array('uses' => 'AccidentController@getPoliceInfo'));
