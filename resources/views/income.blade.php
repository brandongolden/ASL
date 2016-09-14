@extends('layouts.master')

@section('content')
	<h1>My Income</h1>
	<hr/>

	{!! Form::open(['url' => '/income']) !!}
		<div class="form-group">
			{!! Form::label('myincome', 'Monthly Income:') !!}
			{!! Form::text('myincome', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection