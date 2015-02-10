<?php
class AppController extends BaseController {
	public function getManifests()
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
	}
	public function getApp($id)
	{
		//return View::make('app');
		$app = AppEntity::find($id);
		return View::make("apps/".$app->location."/index");
	}
	public function getManifest($id)
	{
		$app = AppEntity::find($id);
		//return json_encode($output, 128);
		return (file_get_contents($_SERVER['DOCUMENT_ROOT']."/apps/".$app->location."/manifest.json"));
	}
	public function getFile($id,$file)
	{
		$app = AppEntity::find($id);
		return Redirect::to("/apps/".$app->location."/".$file);
	}
	public function getView($id,$file)
	{
		$app = AppEntity::find($id);
		return Redirect::to("/apps/".$app->location."/views/".$file);
	}
	public function getController($id,$file)
	{
		$app = AppEntity::find($id);
		return Redirect::to("/apps/".$app->location."/controllers/".$file);
	}
}