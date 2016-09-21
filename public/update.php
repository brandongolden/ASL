<?php
		$billid = $_POST['billid'];
		$billname = $_POST['billname'];
		$payment = $_POST['payment'];
		

		$user = "root";
		$pass = "root";
		$dbh = new PDO('mysql:host=localhost;dbname=laravel5loginregistration;port=8889', $user, $pass);

		$stmt = $dbh->prepare("
		UPDATE bills  
  	 	SET 
  	 	billname = :billname,
       	payment = :payment,
 		WHERE 
 		billid = :billid;
 		");
 		$stmt->bindParam(':billid', $billid);
		$stmt->bindParam(':billname', $billname);
		$stmt->bindParam(':payment', $payment);
		$stmt->execute();

			
		header('Location: http://localhost:8888/laravel5loginregistration.dev/public/bills');
		die();

?>