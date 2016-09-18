@extends('layouts.master')

@section('content')
<h2>Homepage for user {{ \Auth::user()->name }}</h2>


<?php
	$clientid = Auth::user()->id;

	$user = "root";
	$pass = "root";
	$dbh = new PDO('mysql:host=localhost;dbname=laravel5loginregistration;port=8889', $user, $pass);
	$stmt = $dbh->prepare("SELECT * FROM bills WHERE userid = :clientid ORDER BY id ASC;");
	$stmt->bindParam(':clientid', $clientid);
	$stmt->execute();
	$result = $stmt->fetchall(PDO::FETCH_ASSOC);
		
	$userBills = 0;
	foreach ($result as $row) {
		$userBills += $row['payment'];
	}


	$stmt = $dbh->prepare("SELECT * FROM income WHERE id = :clientid ORDER BY id ASC;");
	$stmt->bindParam(':clientid', $clientid);
	$stmt->execute();
	$result = $stmt->fetchall(PDO::FETCH_ASSOC);

	$userIncome = 0;
	foreach ($result as $row) {
		$userIncome = $row['income'];
	}

	$balance = 0;
	$balance = $userIncome - $userBills;

	echo "User Income: " . $userIncome . "<br>";
	echo "Bills: " . $userBills . "<br>";
	echo "Balance: " . $balance;
?>


@endsection