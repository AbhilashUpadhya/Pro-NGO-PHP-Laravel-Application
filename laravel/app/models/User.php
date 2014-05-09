<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
 

 protected $fillable = array('email','username','password','password_temp','code','active');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	public function donor(){

		return $this->hasMany('Ecsdonor');
	}

	public function twodonor(){

		return $this->hasMany('Twodonor');
	}
    
    public function otherdonor(){

    	return $this->hasMany('Otherdonor');
    }

	public function weekend_volunteer(){

		return $this->hasMany('Weekend_volunteer');
	}

	public function volunteer(){

		return $this->hasMany('Volunteer');
	}

    


	public function admin(){

		return $this->hasOne('Admin');
	}

	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}