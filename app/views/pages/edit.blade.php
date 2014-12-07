@extends('layouts.default')

@section('content')
	<div class="row push-down">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-offset-1 col-lg-10 col-lg-offset-1">
			{{ Form::open(array('', 'class'=>'form-horizontal', 'method'=>'post')) }}
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Body</label>
						{{ Form::textarea('body', $edit->body, ['class'=>'form-control','id'=>'body'])}}
					</div>
					<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Here-Cheatsheet" target="_blank">
						<small class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
							Markdown Editor
						</small>
					</a>
				</div>
				<div class="form-group">
					{{ Form::submit('UPDATE', array('name'=>'btn', 'class'=>'btn btn-default')) }}
					{{ Form::submit('DELETE', array('name'=>'btn', 'class'=>'btn btn-default delete')) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop