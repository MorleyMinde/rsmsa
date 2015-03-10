<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/27/15
 * Time: 1:50 AM
 */
class RoadLicence extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_road_license';

    protected  $guarded = array('id');

    public function car(){
        return $this->belongsTo('Vehicle', 'car_id', 'plate_number');
    }

}