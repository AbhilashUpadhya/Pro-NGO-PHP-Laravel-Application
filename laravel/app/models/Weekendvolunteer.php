<?php

class Weekendvolunteer extends Eloquent {


protected $fillable= array('user_id','name','dob','gender','occupation','purpose','category','address','interest','date','phone_no');
public function user(){

return $this->belongsTo('User');

}



}