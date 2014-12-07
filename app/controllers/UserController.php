<?php

class UserController extends \BaseController {


	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function register()
	{
		$validator = Validator::make(Input::all(), User::$rules);
		if($validator->passes())
		{
			$user = new User;
			$user->fname = Input::get('firstname');
			$user->lname = Input::get('lastname');
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			if (Input::hasFile('image'))
			{
 				
	   			$image = new Image;
    			$image->username = 	Input::get('username');
    			$extension = Input::file('image')->getClientOriginalExtension();
    			$image->name = asset('images/user_images/' . Input::get('username') . '.' . $extension);
    			$image->save();
    			Input::file('image')->move(public_path() . '/images/user_images', Input::get('username') . '.' . $extension);
			}
			else
			{
				$image = new Image;
				//Generate unique string to be used in the creation of user's Gravatar url 
				$random = md5(uniqid(' ', true));
				$gravatar =  Gravatar::src($random);
    			$image->username = 	Input::get('username');
    			$image->name = $gravatar;
    			$image->save();
			}

			return Redirect::to('/login')->with('success', "Registration successful, please log in");
		}
		else
		{
			return Redirect::to('/register')->withInput()
											->with('failure',"Registration unsuccessful for the following reasons:")
											->withErrors($validator);
		}
	}

	private function getCredentials()
	{ 
		return array('username'=>Input::get('username'), 'password'=>Input::get('password'));
	}

	public function login()
	{
		$credentials = $this->getCredentials();
		
		if(Auth::attempt($credentials))
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('/login')
			->with('failure', "The username/password combination was incorrect")
			->withInput();
		}	
	}
	

}
