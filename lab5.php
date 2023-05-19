<!DOCTYPE html>
<html>
<head>
	<title>SEARCHING</title>
	<h1>SEACH USER USING USER ID</h1>
</head>
<body>
<form action="lab5.php" method="POST">
	<input type="text" name="user_id" id="user_id" placeholder="ENTER USER ID">
	<input type="submit" class="btn btn-info" value="search">
</form>
<?php
if(isset($_POST['user_id'])){
	$username="root";
	$password="";
	try {
		$conn=new PDO("mysql:host=localhost;dbname=company",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOException $e) {
		echo "connection failed.".$e->getMessage();
	}
	$user_id=$_POST['user_id'];
	$query1 = $conn->prepare("select * from profile where user_id=?");
	$query1->execute([$user_id]);
}

?>
<table class="table m-3">
	<thead>
		<th>USER ID</th>
		<th>FIRST NAME</th>
		<th>LAST NAME</th>
		<th>EMAIL</th>
		<th>PASSWORD</th>
	</thead>
	<tbody>
		<?php
		while ($row = $query1->fetch(PDO::FETCH_OBJ)) {

			echo "<tr>
			<td>$row->user_id</td>
			<td>$row->first_name</td>
			<td>$row->last_name</td>
			<td>$row->email</td>
			<td>$row->password</td>
			</tr>";
			
		}
		?>


</body>
</html>