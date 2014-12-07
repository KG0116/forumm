<?php

class Post extends Eloquent {


	protected $table = 'posts';
	protected $guarded = array();
	public static $rules = array( 'title'=>'required|max:100', 'body' =>'required' );

	public function comments()
	{
		return $this->hasMany('Comment');
	}

}

?>