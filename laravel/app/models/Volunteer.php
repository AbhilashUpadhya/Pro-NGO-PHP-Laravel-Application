<?php


class Volunteer extends Eloquent {

	protected $fillable = array('user_id','email','fullname','gender','dob','address','pincode','type','occupation','purpose','phone_number');
	public function event(){

		return $this->belongsToMany('Eventinfo');
	}

  
     public function user()
    {
        return $this->belongsTo('User');
    }

}