<?php
		$id = $_POST['billid'];
		$name = $_POST['billname'];
		$payment = $_POST['payment'];
		$category = $_POST['category'];
		

		$user = "root";
		$pass = "root";
		$dbh = new PDO('mysql:host=localhost;dbname=laravel5loginregistration;port=8889', $user, $pass);

		$stmt = $dbh->prepare("
		UPDATE bills  
  	 	SET 
  	 	name = :name,
       	payment = :payment,
       	category = :category
 		WHERE 
 		id = :id;
 		");
 		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':payment', $payment);
		$stmt->bindParam(':category', $category);
		$stmt->execute();

		header('Location: http://localhost:8888/laravel5loginregistration.dev/public/bills');
		die();

?>