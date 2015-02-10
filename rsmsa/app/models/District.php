<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/10/2015
 * Time: 10:07 AM
 */

class District extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'districts';

    protected  $guarded = array('id');

    public function region(){
        return $this->belongsTo('Region', 'region_id', 'id');
    }


} 