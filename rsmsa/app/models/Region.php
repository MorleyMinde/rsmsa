<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/10/2015
 * Time: 10:09 AM
 */

class Region extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';

    protected  $guarded = array('id');

    public function district(){
        return $this->hasMany('District', 'region_id', 'id');
    }

} 