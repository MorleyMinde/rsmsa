<?php
class OffenceRegistry extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rsmsa_offence_registry';
	
	/**
	 * Returns the offences assosiated with an offence that has been registered
	 * 
	 * @return array (of Offences)
	 */
	public function offences()
	{
		return $this->belongsToMany('Offence','rsmsa_offence_events','offence_registry_id','offence_id');
	}
}