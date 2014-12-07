@extends('layouts.default')

@section('content')
	<div class="row push-down">
		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
			{{ Form::open( array('url'=>URL::to('/register'), 'class'=>'form-horizontal', 'files' => true)) }}
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="text" class="form-control" placeholder="First Name" name="firstname">
						@if($errors->has('firstname'))
							<small class="errors">
								{{$errors->first('firstname')}}
							</small>
						@endif
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="text" class="form-control" placeholder="Last Name" name="lastname">
						@if($errors->has('lastname'))
							<small class="errors">
								{{$errors->first('lastname')}}
							</small>
						@endif
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="text" class="form-control" placeholder="Username" name="username">
						@if($errors->has('username'))
							<small class="errors">
								{{$errors->first('username')}}
							</small>
						@endif
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="text" class="form-control" placeholder="Email" name="email">
						@if($errors->has('email'))
							<small class="errors">
								{{$errors->first('email')}}
							</small>
						@endif
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="password" class="form-control" placeholder="Password" name="password">
						@if($errors->has('password'))
							<small class="errors">
								{{$errors->first('password')}}
							</small>
						@endif
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls input">
						<input type="password" class="form-control" placeholder="Re-enter Password" name="repassword">
						@if($errors->has('repassword'))
							<small class="errors">
								{{$errors->first('repassword')}}
							</small>
						@endif
					</div>
				</div>
				<div class="control-group">
					<div class="fileinput fileinput-new" data-provides="fileinput">
  						<span class="btn btn-default btn-file">
  							<span class="fileinput-new">Select image</span>
  							<span class="fileinput-exists">Change</span>
  							<input type="file" class="form-control" name="image">
  						</span>
  						<span class="fileinput-filename"></span>
  						<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
					</div>
					@if($errors->has('image'))
						<small class="errors image-error">
							{{$errors->first('image')}}
						</small>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Register</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop