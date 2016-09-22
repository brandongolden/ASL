@extends('layouts.master')

@section('content')

<h2>Login</h2>
@if(count($errors))
	<div class="alert alert-danger">
		<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif
{!! Form::open(array('route' => 'handleLogin')) !!}
	<div class="form-group">
		{!! Form::label('email') !!}
		{!! Form::text('email', null, array('class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password') !!}
		{!! Form::password('password', array('class' => 'form-control')) !!}
	</div>
	{!! Form::token() !!}
	{!! Form::submit(null, array('class' => 'btn btn-default')) !!}
	{!! Form::close() !!}
	<br>
@endsection