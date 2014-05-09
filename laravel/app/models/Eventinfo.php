<?php

class Eventinfo extends Eloquent {
	protected $fillable = array('title','description','address','location','pincode','start_date','end_date','start_time','end_time','filename','image');

   public function volunteer(){

     return $this->belongsToMany('Volunteer');   	
   }

  

}