<?php
class OffenceController extends BaseController {

	/**
	 * Process post request for offence.
	 */
	public function processOffencePost()
	{
		$request = Request::instance();
		$content = $request->getContent();
		$json = json_decode($content,true);
		$offenceJSON = $json['offence'];
		$eventsJSON = $json['events'];
		DB::transaction(function()use ($offenceJSON,$eventsJSON)
		{
			$offence = "";
			if(array_key_exists( "id", $offenceJSON)){
				$offence = Offence::find($offenceJSON['id']);
				foreach($offenceJSON as $key => $val)
				{
					//return $key.$val;
					$offence[$key] = $val;
				}
				$offence->save();
			}else {
				$offence = new Offence();
				foreach($offenceJSON as $key => $val)
				{
					//return $key.$val;
					$offence[$key] = $val;
				}
				$offence->save();
			}
			foreach($eventsJSON as $registry)
			{
				$event = new OffenceEvent();
				$event->offence_id = $offence->id;
				$event->offence_registry_id = $registry['id'];
				try{
					$event->save();
				}catch(Exception $qe){
					
				};
			}
		});
		return "{'status':'OK'}";
	}
	public function getEvents($id)
	{
		$offence = Offence::find($id);
		//return $offence;
		return $offence->offenceRegistries;
	}
	public function delete($id)
	{
		/*DB::transaction(function()use ($id)
		{
			$offence = Offence::find($id);
			foreach ($offence->offenceRegistries as $event)
			{
				$event->delete();
			}
			$offence->delete();
		});*/
		
		return json_encode("{'status':'OK'}");
	}
	public function getOffences(){
		return Offence::all();
	}
	public function getOffenceRegistry()
	{
		return OffenceRegistry::all();
	}
	public function getOffence($id)
	{
		return Offence::find($id);
	}
}