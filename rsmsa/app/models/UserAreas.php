<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/6/15
 * Time: 3:36 AM
 */
class UserAreas extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_userAreas';

    protected  $guarded = array('id');

    public function user(){
        return $this->belongsTo('User', 'user_id', 'id');
    }
}
