<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.head')
</head>

<body>
	<div id="wrap">
		@include('includes.header')
	    <!-- image header -->
	    @if($view == 'post')
	    	<header class="intro-header" style="background: url({{ asset('/images/black_denim.png') }});">
        		<div class="container">
            		<div class="row text-center">
                		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    		<div class="post-heading">
                                <img src="{{ Image::find(User::find($post->user_id)->username)->name}}" alt="" class="img-circle profile">
        						<h1>{{{ $post->title }}}</h1>
        						<span class="meta">Posted by 
                                    <a href="{{action('PostController@userPosts', array(User::find($post->user_id)->username))}}">
                                        {{{ $username }}}
                                    </a> 
                                    on 
                                    {{ date_format($post->created_at, 'F d, Y') }}
                                </span>
    						</div>
                		</div>
            		</div>
        		</div>
    		</header>
    	@else
	    	<header class="intro-header" style="background: url({{ asset('/images/black-Linen.png') }});">
        		<div class="container">
            		<div class="row">
                		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    		<div class="site-heading">
        						<h1>{{ucfirst($view)}}</h1>
        						<hr class="small">
        						@if($view == 'forumm...')
        							<span class="subheading" id="subheading">
       									Now that you have everyone's attention, what will you say?
        							</span>
        						@endif
    						</div>
                		</div>
            		</div>
        		</div>
    		</header>
    	@endif

		<!-- main content -->
		<div class="container">
			@yield('content')
		</div>
	</div>

	<footer>
		@include('includes.footer')
	</footer>	

	{{HTML::script('js/forumm.min.js')}}

</body>

</html>