<?php

class CommentController extends \BaseController
{

	public function submitComment($id){

		$validator = Validator::make(Input::all(), Comment::$rules);

		if($validator->passes()){
			
			$comment = array(

						'user_id'=> Auth::user()->id,
						'post_id'=> $id,
						'comment'=> Input::get('comment')
			);
			Comment::create($comment);

			return Redirect::back();
		}
		else{
			
			return Redirect::back()->withErrors($validator);
		}
	}
}
