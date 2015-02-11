<?php
class Station extends Eloquent{

    protected $table = 'rsmsa_stations';

    public function police(){

        return $this->hasOne('Police');
    }
}