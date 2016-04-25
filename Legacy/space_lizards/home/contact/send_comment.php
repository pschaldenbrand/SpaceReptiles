<?php
//Written by Peter Schaldenbrand
/*
This will send the message typed in contact.php
it saves the comment in the Comments table in the
space_lizards database
*/
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="../../CSS/space.css">
	<title>SPACE LIZARDS FROM SPACE</title>
</head>
<body>
<?php
	//connect to the mysql database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password);
	
	if( $conn->connect_error){
		die( "Connection to mysqli failed" . $conn->connect_error);
	}
	
	//create the space_lizards database if it doesn't already exist
	$db = "space_lizards";
	$sql = "CREATE DATABASE IF NOT EXISTS space_lizards";
	if ($conn->query($sql) === false) {
		echo "Error creating database space_lizards: " . $conn->error;
	}
	
	//connect to the space_lizards database
	$conn = new mysqli( $servername, $username, $password, $db );
	if( $conn->connect_error) {
		die("Connection to database failed: ".$conn->connect_error);
	}
	
	//create the Comments table if it doesn't already exist
	$sql = "CREATE TABLE IF NOT EXISTS Comments (
			name varchar(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			comment VARCHAR(241),
			PRIMARY KEY (name, time)
			)";
	if ($conn->query($sql) === false ){
		echo "Error creating table: " . $conn->error;
	}
	$name = rtrim($_SESSION["username"]);
	$pass = rtrim($_SESSION["password"]);
	$comment = rtrim($_POST["comment"]);
	$comment = nl2br($comment);
	$name = 
	$sql = "INSERT INTO Comments(name,password,comment)
			VALUES( '$name', '$pass', '$comment' )";
	if ($conn->query($sql) === false ){
		echo "Error inserting data into comments table: " . $conn->error;
	}
	/*
	//This will print out all teh comments that anyone has made.
	//It's useful for debugging but not good for users to see
	//everyone's private messages to the Lizard God.
	$conn = new mysqli( $servername, $username, $password, $db );
	$sql = "SELECT * FROM Comments";
	$rslt = $conn->query($sql);
	if ($rslt) {
		$row = $rslt->fetch_assoc();
		while( $row ){
			?><p class = "one"><?php
			echo "Name: ".$row["name"]."<br/>".$row["comment"];
			$row = $rslt->fetch_assoc();
			?></p><br/><?php
		}
	}
	*/

	//once the program is done saving the message, go back to the home page
	header("Location: ../home1.php");
	exit;
?>
</body>
</html>