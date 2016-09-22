@extends('layouts.master')

@section('content')
<h2>Homepage for user {{ \Auth::user()->name }}</h2>
<hr />


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

	$creditcards = 0;
	$mortgagerent = 0;
	$utilites = 0;
	$insurance = 0;
	$phoneinternet = 0;
	$loans = 0;
	$other = 0;

	foreach ($result as $row) {
		$userBills += $row['payment'];

		$category = $row['category'];

		if ($category == "1") {
			$creditcards += $row['payment'];
		} elseif ($category == "2") {
			$mortgagerent += $row['payment'];
		} elseif ($category == "3") {
			$utilites += $row['payment'];
		} elseif ($category == "4") {
			$insurance += $row['payment'];
		} elseif ($category == "5") {
			$phoneinternet += $row['payment'];
		} elseif ($category == "6") {
			$loans += $row['payment'];
		} elseif ($category == "7") {
			$other += $row['payment'];
		}
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



	$userIncome = 0;
	foreach ($result as $row) {
		$userIncome = $row['income'];
	}


	/*
	echo "User Income: $" . $userIncome . "<br>";
	echo "Bills: $" . $userBills . "<br>";
	echo "Balance: $" . $balance . "<br><br>";
	*/
	/*
	echo "Credit Cards: $" . $creditcards . "<br>";
	echo "Mortgage/Rent: $" . $mortgagerent . "<br>";
	echo "Utilites: $" . $utilites . "<br>";
	echo "Insurance: $" . $insurance . "<br>";
	echo "Phone/Internet: $" . $phoneinternet . "<br>";
	echo "Loans: $" . $loans . "<br>";
	echo "Other: $" . $other . "<br>";
	*/
?>

<h3 style="float:left;">Bills</h3>
<canvas id="bills" width="300" height="300" style="float:left;"></canvas>
<h3 style="float:left;">Balance</h3>
<canvas id="balance" width="300" height="300" style="float:left;margin-bottom: 30px;"></canvas>

<script>
var pieData = [
   {
      value: <?php echo $creditcards; ?>,
      label: 'Credit Cards',
      color: 'blue'
   },
   {
      value: <?php echo $mortgagerent; ?>,
      label: 'Mortgage/Rent',
      color: 'orange'
   },
   {
      value: <?php echo $utilites; ?>,
      label: 'Utilites',
      color: 'red'
   },
   {
      value : <?php echo $insurance; ?>,
      label: 'Insurance',
      color: 'yellow'
   },
   {
      value: <?php echo $phoneinternet; ?>,
      label: 'Phone/Internet',
      color: 'purple'
   },
   {
      value: <?php echo $loans; ?>,
      label: 'Loans',
      color: 'navy'
   },
   {
      value : <?php echo $other; ?>,
      label: 'Other',
      color: 'maroon'
   }
];
var context = document.getElementById('bills').getContext('2d');
var billsChart = new Chart(context).Pie(pieData);

var pieDataBalance = [
   {
      value: <?php echo $userBills; ?>,
      label: 'Bills',
      color: 'gray'
   },
   {
      value: <?php echo $balance; ?>,
      label: 'Balance',
      color: 'green'
   }
];
var contextBalance = document.getElementById('balance').getContext('2d');
var balanceChart = new Chart(contextBalance).Pie(pieDataBalance);
</script>

<table class="table table-striped">
	<tr><th>Bill Category</th><th>Total</th></tr>
	<tr><td><i class="fa fa-paint-brush" style="color:blue;" aria-hidden="true"></i> Credit Cards</td><td>$<?php echo $creditcards; ?></td></tr>
	<tr><td><i class="fa fa-paint-brush" style="color:orange;" aria-hidden="true"></i> Mortgage/Rent</td><td>$<?php echo $mortgagerent; ?></td></tr>
	<tr><td><i class="fa fa-paint-brush" style="color:red;" aria-hidden="true"></i> Utilites</td><td>$<?php echo $utilites; ?></td></tr>
	<tr><td><i class="fa fa-paint-brush" style="color:yellow;" aria-hidden="true"></i> Insurance</td><td>$<?php echo $insurance; ?></td></tr>
	<tr><td><i class="fa fa-paint-brush" style="color:purple;" aria-hidden="true"></i> Phone/Internet</td><td>$<?php echo $phoneinternet; ?></td></tr>
	<tr><td><i class="fa fa-paint-brush" style="color:navy;" aria-hidden="true"></i> Loans</td><td>$<?php echo $loans; ?></td></tr>
	<tr><td><i class="fa fa-paint-brush" style="color:maroon;" aria-hidden="true"></i> Other</td><td>$<?php echo $other; ?></td></tr>
</table>
@endsection