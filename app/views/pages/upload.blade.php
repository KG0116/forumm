<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/jasny-bootstrap.css')}}
</head>
<body>
	@if(Session::has('message'))
		{{ $message }}
    @endif
<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
	{{ Form::open( array('', 'class'=>'form-horizontal', 'files' => true)) }}
		<div class="control-group">
		<div class="form-group floating-label-form-group controls input">
			<div class="fileinput fileinput-new input-group" data-provides="fileinput">
  <div class="form-control" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
</div>
		</div>
	</div>

				<div class="form-group">
					<button type="submit" onclick="submit();" class="btn btn-default">Register</button>
				</div>

	{{ Form::close() }}
</div>
</div>

	{{HTML::script('js/jquery.min.js')}}
	{{HTML::script('js/bootstrap.min.js')}}
	{{HTML::script('js/jasny-bootstrap.js')}}
</body>
</html>