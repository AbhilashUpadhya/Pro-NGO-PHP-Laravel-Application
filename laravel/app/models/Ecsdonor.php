<?php



class Ecsdonor extends Eloquent {
 
 protected $fillable = array('user_id','first_name','surname','gender','occupation','address','pincode');

  

     public function user()
    {
        return $this->belongsTo('User');
    }


   

}