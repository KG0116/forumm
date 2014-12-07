<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/clean-blog.css')}}
	<style>
		.delete:hover{
    background-color: #cc1122;
    border-color: #cc1122;
}
	</style>
</head>
<body>
	{{ Form::open(array('url' => URL::to('form-test'), 'class'=>'form-horizontal')) }}
		{{ Form::text('title', null, array('class' => 'form-control')) }}
		{{ Form::submit('UPDATE', array('name'=>'btn', 'class'=>'btn btn-default')) }}
		{{ Form::submit('DELETE', array('name'=>'btn', 'class'=>'btn btn-default delete')) }}
	{{ Form::close() }}				
</body>
</html>