<?php	
	$user = "root";
	$pass = "root";
	$dbh = new PDO('mysql:host=localhost;dbname=laravel5loginregistration;port=8889', $user, $pass);

	$id = $_GET['id'];
	
	$stmt = $dbh->prepare("DELETE FROM bills WHERE id = :id;");
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	header("Location: http://localhost:8888/laravel5loginregistration.dev/public/bills");
	die();
?>