<?php
use Carbon\Carbon;
class OffenceController extends BaseController {

	/**
	 * Process post request for offence.
	 */
	public function processOffencePost()
	{
		//var_dump(Input::all());exit;
		$request = Request::instance();
		$content = $request->getContent();
		$json = json_decode($content,true);
		$offenceJSON = $json['offence'];
		$eventsJSON = $json['events'];
		try{
			DB::transaction(function()use ($offenceJSON,$eventsJSON)
			{
				$offence = "";
				$hasID = false;
				if(array_key_exists( "id", $offenceJSON)){
					if($offenceJSON['id'] != "")
					{
						$offence = Offence::find($offenceJSON['id']);
						$this->saveOffence($offence,$offenceJSON);
						$hasID = true;
					}
				}
				if(!$hasID){
					
					$offence = new Offence();
					$this->saveOffence($offence,$offenceJSON);
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
		}catch(Exception $exception){
			Log::error($exception);
			return "{'status':'ERROR','code': 1,'message':'Message will come soon.'}";
		}
		return "{'status':'OK'}";
	}
	private function saveOffence($offence,$offenceJSON){
		$offence->setValuesByJSON($offenceJSON);
		if(is_numeric ($offence['offence_date']))
		{
			$offence['offence_date'] = date("Y-m-d",$offence['offence_date']);
		}
		$offence->save();
	}
	public function getEvents($id)
	{
		$offence = Offence::find($id);
		//return $offence;
		return $offence->offenceRegistries;
	}
	public function delete($id)
	{
		DB::transaction(function()use ($id)
		{
			$offence = Offence::find($id);
			$offence->delete();
		});
		
		return json_encode("{'status':'OK'}");
	}
	public function getOffences(){
		return Offence::all();
	}
	public function getOffenceRegistry()
	{
		return OffenceRegistry::all();
	}
	public function getOffenceRegistryOffences($id){
		$offenceReg = OffenceRegistry::find($id);
		return $offenceReg->offences;
	}
	public function getOffence($id)
	{
		return Offence::find($id);
	}
	public function getReport()
	{
		//return Offence::groupBy('offence_date')->get();
		return Offence::select(DB::raw("DATE_FORMAT(offence_date,'%M') as time"), DB::raw('count(*) as offences'))
    ->groupBy("time")->orderBy("offence_date")->get();
	}
	public function getStats(){
		$request = Request::instance();
		$content = $request->getContent();
		$json = json_decode($content,true);
		if($json['type'] != null)
		{
			if($json['type'] == "gender")
			{
				return Driver::select(DB::raw("gender"),DB::raw("count(*) as offences"))->join('rsmsa_offences', 'rsmsa_drivers.license_number', '=', 'rsmsa_offences.driver_license_number')->groupBy('gender')->get();
				return "hey";
			}
			
		}else
		{
			return Offence::select(DB::raw("DATE_FORMAT(offence_date,'%M') as time"), DB::raw('count(*) as offences'))
			->groupBy("time")->orderBy("offence_date")->get();
		}
		
	}
}