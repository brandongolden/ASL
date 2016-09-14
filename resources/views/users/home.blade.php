@extends('layouts.master')

@section('content')
<h2>Homepage for user {{ \Auth::user()->name }}</h2>
@endsection