<?php 
//Written by Peter Schaldenbrand 
//This deletes all the information in the space_lizards database
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="space.css">
	<title>SPACE LIZARDS FROM SPACE</title>
</head>
<body>
<p class = "three">
<?php
	//connect to the mysql database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password);
	
	if( $conn->connect_error){
		die( "Connection to mysqli failed" . $conn->connect_error);
	}
	
	//drop the database
	$sql = "DROP DATABASE space_lizards";
	if ($conn->query($sql) === false) {
		echo "Error dropping database space_lizards: " . $conn->error;
	}
?>
</p>
</body>
</html>
