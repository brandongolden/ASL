<?php
	$billid = $_GET["id"];

	$user = "root";
	$pass = "root";
	$dbh = new PDO('mysql:host=localhost;dbname=laravel5loginregistration;port=8889', $user, $pass);

	$stmt = $dbh->prepare("SELECT * FROM bills WHERE id = :id;");
	$stmt->bindParam(':id', $billid);
	$stmt->execute();
	$result = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
	    $billname = $row['name'];
	    $payment = $row['payment'];
	    $category = $row['category'];
	 }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Update Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>My Application</h1>
	<h2>Update</h2>
	<hr>
	<form action="update.php" method="POST">
		<div class="form-group">
			<input type="hidden" name="billid" value="<?php echo $billid; ?>">
		</div>
		<div class="form-group">
			<label for="billname">Bill Name:</label>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="billname" value="<?php echo $billname; ?>" required>
		</div>
		<div class="form-group">
			<label for="payment">Bill Payment:</label>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="payment" value="<?php echo $payment; ?>" required>
		</div>

		<div class="form-group">
			<label for="category">Category:</label>
		</div>
		<div class="form-group">
		<select class="form-control" id="category" name="category" required><option value="1">Credit Cards</option><option value="2">Mortgage/Rent</option><option value="3">Utilities</option><option value="4">Insurance</option><option value="5">Phone/Internet</option><option value="6">Loans</option><option value="7">Other</option></select>

		</div>
		<script>
			<?php $index = $category - 1; ?>
			document.getElementById('category').selectedIndex=<?php echo $index; ?>;
		</script>
		<div class="form-group">
			<input class="btn btn-primary form-control" type="submit" value="Update">
		</div>
	</form>	
</div>
</body>
</html>