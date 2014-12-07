@extends('layouts.default')

@section('content')
	@if (Session::has('failure'))
		<div class="alert alert-danger alert-error" role="alert">
			<a href="#" class="close" data-dismiss="alert">&times</a>
			<h4> {{ Session::get('failure') }} </h4>
		</div>
	@elseif(Session::has('success'))
		<div class="alert alert-success" role="alert">
			<a href="#" class="close" data-dismiss="alert">&times</a>
			<h4> {{ Session::get('success') }} </h4>
		</div>
	@endif
	<div class="row push-down">
		<div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
			<form action="" class="form-horizontal" method="POST" >
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" onclick="submit();" class="btn btn-default">Login</button>
				</div>
			</form>
		</div>
	</div>
@stop