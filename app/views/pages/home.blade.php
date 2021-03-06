@extends('layouts.default')

@section('content')
	<div class="row push-down">
		<div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
			@foreach ($posts as $post)
				<div class="post-preview">
					<a href="{{action('PostController@userPosts', array(User::find($post->user_id)->username, $post->slug))}}">
						<h2 class="post-title">
							{{{ $post->title }}}
						</h2>
					</a>
					<p class="post-meta">
						Posted by 
						<a href="{{action('PostController@userPosts', array(User::find($post->user_id)->username))}}">
							{{{ User::find($post->user_id)->username }}}
						</a>
						on {{ date_format($post->created_at, 'F d, Y') }}
						<br />
						<i class="fa fa-comment-o"></i> 
						{{ count($post->comments) }} 
						<a href="{{action('PostController@userPosts', array(User::find($post->user_id)->username, $post->slug)).'#'.'comments'}}">
							comments
						</a>
						{{-- display edit link if the currently-logged-in user is the author of the post --}}
						@if(Auth::check())
                            @if(Auth::user()->id == $post->user_id)
                                <a href="{{action('edit', array(Auth::user()->username, $post->slug))}}" class="link-edit">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            @endif
                        @endif 
					</p>					
				</div>
				<hr>
			@endforeach
			<ul class="pager">
				<li class="next">
					<a href="{{action('PostController@all')}}">Older Posts &rarr;</a>
				</li>
			</ul>
		</div>
	</div>
@stop