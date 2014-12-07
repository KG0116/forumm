<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::filter('exists', function($route){

	$id = User::where('username', '=', $route->getParameter('username'))->first()->id;
	$post = Post::where('user_id', '=', $id)
				->where('slug', '=', $route->getParameter('slug'))->first();

	$access = ( $id == Auth::user()->id );

	//(a ^ b)' = a' v b'
	if( !count( $post ) or !$access ){

		return Redirect::to('/');
	}

});

Route::get('/', function()
{
	$posts = Post::orderBy('id', 'DESC')->paginate(10);
	return View::make('pages.home', array('view' => 'forumm...', 'posts'=>$posts));
});

Route::get('/register', function(){

	return View::make('pages.register', array('view'=>'register'));
});

Route::get('/login', function(){

	return View::make('pages.login', array('view'=>'login'));
});

Route::get('/create', array('before' => 'auth', function(){

	return View::make('pages.create', array('view'=>'create'));
}));

Route::get('/logout', array('before' => 'auth', 'uses' => 'UserController@logout'));
Route::get('/posts', 'PostController@all');
Route::get('/search', 'PostController@search');
Route::get('/posts/{username}/{slug?}', 'PostController@userPosts');
Route::get('/edit/{username}/{slug}', array('before'=>'auth|exists', 'uses'=>'PostController@edit', 'as'=>'edit'));

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::post('/create', 'PostController@submitPost');
Route::post('/posts/{username}/{slug?}', array('uses'=>'CommentController@submitComment', 'as'=>'comment'));
Route::post('/edit/{username}/{slug}', 'PostController@updatePost');



