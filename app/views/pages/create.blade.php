@extends('layouts.default')

@section('content')
	<div class="row push-down">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-offset-1 col-lg-10 col-lg-offset-1">
			@foreach ($errors->all() as $error)
				<h5 class="errors text-center"> 
					{{ $error }}  
				</h5>
			@endforeach
			<form action="" class="form-horizontal" method="POST">
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<label>Title</label>
						<input type="text" class="form-control" placeholder="Title" name="title">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Body</label>
						<textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Body" id="body"></textarea>
					</div>
					<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Here-Cheatsheet" target="_blank">
						<small class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
							Markdown Editor
						</small>
					</a>
				</div>
				
				<div class="form-group">
					<button type="submit" onclick="submit();" class="btn btn-default">Post</button>
				</div>
			</form>
		</div>
	</div>
@stop