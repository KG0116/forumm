@extends('layouts.default')

@section('content')
	<div class="row push-down">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-offset-1 col-lg-10 col-lg-offset-1">
			{{ $post->body }}
		</div>	
	</div>
	<div class="row push-down">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-offset-1 col-lg-10 col-lg-offset-1">
			<h4 id="comments">Comments</h4>
			<hr>
		</div>	
	</div>
	
	<div class="row">	
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-offset-1 col-lg-10 col-lg-offset-1">
			{{Form::open(array('action'=>array('comment', $post->id), 'class'=>'form-horizontal'))}}
				<div class="control-group">
					<div class="form-group controls">
						<textarea name="comment" class="form-control txt-comment" placeholder="Leave a comment" maxlength="600"></textarea>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default btn-comment">Post Comment</button>
				</div>
				@if (Auth::check())
					<input type="hidden" name="auth" value="1">
				@else
					<input type="hidden" name="auth" value="0">
				@endif
		    {{Form::close()}}
		</div>
	</div>	
	
	@if(count($post->comments))
		@foreach ($post->comments as $comment)
			<div class="row push-down comment-row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-offset-1 col-lg-10 col-lg-offset-1">
					<div class="media">
						<a href="{{action('PostController@userPosts', array(User::find($comment->user_id)->username))}}" class="pull-left">
							<img src="{{Image::find(User::find($comment->user_id)->username)->name}}" class="comment media-object" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="{{action('PostController@userPosts', array(User::find($comment->user_id)->username))}}" class="">
									{{User::find($comment->user_id)->username}}
								</a>
								<small>
									<i>
										on {{ date_format($comment->created_at, 'F d, Y') }}
									</i>
								</small>
							</h4>
							<span class="comment-body">
								{{$comment->comment}}
							</span>				
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@endif
@stop