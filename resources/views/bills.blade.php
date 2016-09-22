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
			{!!  Form::select('category', [
			'1' => 'Credit Cards', 
			'2' => 'Mortgage/Rent',
			'3' => 'Utilities',
			'4' => 'Insurance',
			'5' => 'Phone/Internet',
			'6' => 'Loans',
			'7' => 'Other'
			],  '1', ['class' => 'form-control' ]) !!}
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
        echo "<tr><th>Bill Name</th><th>Bill Payment</th><th>Category</th><th>Update</th><th>Delete</th></td>";
        foreach ($result as $row) {
        	$id = $row['id'];
            $name = $row['name'];
            $payment = $row['payment'];
            $category = $row['category'];

            if ($category == "1") {
            	$category = "Credit Cards";
            } elseif ($category == "2") {
            	$category = "Mortgage/Rent";
            } elseif ($category == "3") {
            	$category = "Utilites";
            } elseif ($category ==  "4") {
            	$category = "Insurance";
            } elseif ($category == "5") {
            	$category = "Phone/Internet";
            } elseif ($category == "6") {
            	$category = "Loans";
            } elseif ($category == "7") {
            	$category = "Other";
            }

            echo '<tr><td>' . $name . '</td><td>$' . $payment . '</td><td>' . $category . '</td>
            <td><a href="updateform.php?id=' . $id . '">Update</a></td>
            <td><a href="delete.php?id=' . $id . '">Delete</a></td></tr>';


        }
	?>

@endsection