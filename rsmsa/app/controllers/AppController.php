<?php
/**
 * This is the controller for apps
 * 
 * @author Vincent P. Minde
 *
 */
class AppController extends BaseController {
	/**
	 * Gets the manifest data in JSON of all apps
	 * 
	 * Returns a json string
	 * 
	 * @return string 
	 */
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
				//$json->name = $app->name;
			}catch(Exception $e){
				continue;
			}
			array_push($arr,$json);
		}
		//Encode to json
		return json_encode($arr);
	}
	/**
	 * Get app index file
	 * 
	 * @param unknown $id
	 */
	public function getApp($id)
	{
		//return View::make('app');
		$app = $this->getAppByExp($id);
		return View::make("apps/".$app->location."/index");
	}
	/**
	 * Get manifest app
	 * 
	 * @param int|string $id
	 * 
	 */
	public function getManifest($id)
	{
		$app = $this->getAppByExp($id);
		//return json_encode($output, 128);
		return (file_get_contents($_SERVER['DOCUMENT_ROOT']."/apps/".$app->location."/manifest.json"));
	}
	/**
	 * Get a file from an app directory
	 * 
	 * @param int|string $id (app id)
	 * 
	 * @param string $file (file relative to app directory)
	 */
	public function getFile($id,$file)
	{
		$app = $this->getAppByExp($id);
		return Redirect::to("/apps/".$app->location."/".$file);
	}
	/**
	 * Get a view from an app directory
	 *
	 * @param int|string $id (app id)
	 *
	 * @param string $file (file relative to app view directory)
	 */
	public function getView($id,$file)
	{
		$app = $this->getAppByExp($id);
		return Redirect::to("/apps/".$app->location."/views/".$file);
	}
	/**
	 * Get a controller from an app directory
	 *
	 * @param int|string $id (app id)
	 *
	 * @param string $file (file relative to app controller directory)
	 */
	public function getController($id,$file)
	{
		$app = $this->getAppByExp($id);
		return Redirect::to("/apps/".$app->location."/controllers/".$file);
	}
	private function getAppByExp($id){
		if(is_numeric($id))
		{
			return AppEntity::find($id);
		}else{
			return AppEntity::where("location","=",$id)->first();
		}
	}
}