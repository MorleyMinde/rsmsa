<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/6/15
 * Time: 3:38 AM
 */
class UserApps extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_userApps';

    protected  $guarded = array('id');

    public function user(){
        return $this->belongsTo('User', 'user_id', 'id');
    }
}