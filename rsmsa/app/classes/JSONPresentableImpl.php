<?php
class JSONPresentableImpl extends Eloquent implements IsJSONPresentable{
	public function setValuesByJSON($json){
		foreach($json as $key => $val)
		{
			$this[$key] = $val;
		}
	}
}