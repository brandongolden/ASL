@extends('layouts.master')

@section('content')
	<h2>Bills</h2>
	<hr/>

	{!! Form::open(['url' => '/bills']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Bill Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('payment', 'Bill Payment:') !!}
			{!! Form::text('payment', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection