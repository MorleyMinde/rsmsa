<?php

class Receipt extends JSONPresentableImpl{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rsmsa_receipts';
	
	public $timestamps = false;
}