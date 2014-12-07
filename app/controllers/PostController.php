<?php

class PostController extends BaseController 
{

	//search posts by keyword
	public function search()
	{
		$keyword = Input::get('srch-term');
		$posts = Post::where('body', 'LIKE', '%' . $keyword . '%')->orWhere('title', 'LIKE', '%' . $keyword . '%')->get();
		
		return View::make('pages.posts', array('view'=>'posts', 'posts'=>$posts));	
	}

	//get all posts
	public function all()
	{
		
		$posts = Post::all();

		return View::make('pages.posts', array('view'=>'posts', 'posts'=>$posts));
	}

	//get a list of all user posts, or get a specific user post
	public function userPosts($username, $slug = null)
	{
		if(isset($slug))
		{
			$user = User::where('username', '=', $username)->first();
			$id = $user->id;
			$post = Post::where('user_id', '=', $id)->where('slug', '=', $slug)->first();

			return View::make('pages.post', array('view'=>'post', 'post'=>$post, 'username'=>$username));
		}
		else
		{
			$user = User::where('username', '=', $username)->first();
			$id = $user->id;
			$posts = Post::where('user_id', '=', $id)->get();

			return View::make('pages.posts', array('view'=>'posts', 'posts'=>$posts));
		}
		
	}

	//submit a post
	public function submitPost(){

		$validator = Validator::make(Input::all(), Post::$rules);

		if($validator->passes()){
	
			$post = array(

						'user_id'=> Auth::user()->id, 
						'title'  => Input::get('title'), 
						'slug'   => Str::slug(Input::get('title')),
						'body'   => Purifier::clean(Markdown::render(Input::get('body'))) 
			);
			//save raw markdown in edit table
			$edit = array(

						'user_id'=> Auth::user()->id, 
						'title'  => Input::get('title'), 
						'slug'   => Str::slug(Input::get('title')),
						'body'   => Input::get('body') 
			);

			Post::create($post);
			Edit::create($edit);

			return Redirect::to('/');

		}
		else{
			
			return Redirect::back()->withErrors($validator);
		}	
	}

	//edit a post
	public function edit($username, $slug){

		$id = User::where('username', '=', $username)->first()->id;
		$edit = Edit::where('user_id', '=', $id)->where('slug', '=', $slug)->first();
		return View::make('pages.edit', array('view'=>'edit', 'edit'=>$edit));
	}

	//update a post 
	public function updatePost($username, $slug){

		$validator = Validator::make(Input::all(), Edit::$rules);
		$btn = Input::get('btn');

		if($validator->passes() and $btn == 'UPDATE' ){

			$id = User::where('username', '=', $username)->first()->id;
			$post = Post::where('user_id', '=', $id)->where('slug', '=', $slug)->first();
			$edit = Edit::where('user_id', '=', $id)->where('slug', '=', $slug)->first();
			$post->body = Purifier::clean(Markdown::render(Input::get('body')));
			$post->save();
			$edit->body = Input::get('body');
			$edit->save();

			return Redirect::to('/');
		}
		elseif($btn == 'DELETE'){

			$id = User::where('username', '=', $username)->first()->id;
			$post = Post::where('user_id', '=', $id)->where('slug', '=', $slug)->first();
			$edit = Edit::where('user_id', '=', $id)->where('slug', '=', $slug)->first();
			$post->delete();
			$edit->delete();

			return Redirect::to('/');
		}
		else{

			return Redirect::back()->withErrors($validator);
		}		
	}

}
