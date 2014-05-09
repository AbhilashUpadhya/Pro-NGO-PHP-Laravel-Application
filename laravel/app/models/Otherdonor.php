<?php


class Otherdonor extends Eloquent {

	protected $fillable = array('user_id','interest','comment','other','date');

public function user(){

	return $this->belongsTo('User');
}



}