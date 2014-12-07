<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('fname', 'lname');

	public static $rules = array(
										'firstname' =>'required|alpha|min:2',
										'lastname'  =>'required|alpha|min:2',
										'username'  =>'required|alpha_num|min:6|unique:users',
										'email'     =>'required|email|unique:users',
										'password'  =>'required|alpha_num|min:8',
										'repassword'=>'required|same:password',
										'image'     =>'image|mimes:jpeg,jpg,png,bmp|max:25000000'
			    				);

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function image()
	{
		return $this->hasOne('Image', 'username', 'username');
	}

}
