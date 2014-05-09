<?php

class Twodonor extends Eloquent {

protected $fillable = array('user_id','first_name','surname','gender','occupation','address','pincode','phone_no','purpose','token','dob','date','amount');

public function user(){

	return $this->belongsTo('User');
}

}
