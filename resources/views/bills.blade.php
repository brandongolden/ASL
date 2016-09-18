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
			{!! Form::label('category', 'Category:') !!}
			{!! Form::select('cetegory', array(
			'1' => 'Credit Cards', 
			'2' => 'Mortgage/Rent',
			'3' => 'Insurance',
			'4' => 'Phone/Internet',
			'5' => 'Loans',
			'6' => 'Other'
			)) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
	<?php
		$clientid = Auth::user()->id;

        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=laravel5loginregistration;port=8889', $user, $pass);
        $stmt = $dbh->prepare("SELECT * FROM bills WHERE userid = :clientid ORDER BY id ASC;");
        $stmt->bindParam(':clientid', $clientid);
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        echo '<table class="table table-striped">';
        echo "<tr><th>Bill Name</th><th>Bill Payment</th></td>";
        foreach ($result as $row) {
            $name = $row['name'];
            $payment = $row['payment'];
            echo '<tr><td>' . $name . '</td><td>$' . $payment . '</td></tr>';
        }
	?>

@endsection