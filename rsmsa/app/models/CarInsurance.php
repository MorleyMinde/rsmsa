<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/17/15
 * Time: 9:04 PM
 */
class CarInsurance extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_car_insurance';

    protected  $guarded = array('id');

    public function car(){
        return $this->belongsTo('Vehicle', 'car_id', 'id');
    }

    public function insurance_company(){
        return $this->belongsTo('Insurance', 'company_id', 'id');
    }

    public function village(){
        return $this->hasMany('Village', 'district_id', 'id');
    }
}