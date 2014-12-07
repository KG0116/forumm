<?php

class Comment extends Eloquent {

	protected $table = 'comments';
	protected $guarded = array();
	public static $rules = array( 'comment' =>'required' );

}