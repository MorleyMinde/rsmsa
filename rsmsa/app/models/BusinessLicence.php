<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/27/15
 * Time: 3:25 AM
 */
class BusinessLicence extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_business_license';

    protected  $guarded = array('id');

    public function car(){
        return $this->belongsTo('Vehicle', 'car_id', 'plate_number');
    }

}