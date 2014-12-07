<?php

class Edit extends Eloquent {


	protected $table = 'edits';
	protected $guarded = array();
	public static $rules = array( 'body' =>'required' );

}

?>