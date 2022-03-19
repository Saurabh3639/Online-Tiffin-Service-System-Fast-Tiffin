<html>
<body>
<?php
	//servername
	$servername = "localhost";
	//username
	$username = "root";
	//empty password
	$password = "";
	//geek is the database name
	$dbname = "tiffdb";

	// Create connection by passing these connection parameters
	$conn = new mysqli($servername, $username, $password, $dbname);

	//sql query
	$sql = "SELECT SUM(cost) from tblinventory";

	$result = $conn->query($sql);
	//display data on web page
	while($row = mysqli_fetch_array($result)){
		echo $row['SUM(cost)'];
		echo "<br>";
	}

	$conn->close();
?>
</body>
</html>
