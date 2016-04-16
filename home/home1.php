<?php
//Written by Peter Schaldenbrand
//This is the home page for the site
//it has an option for going on a journey, contacting
//the lizard God, and logging out.  At the bottom, it has a
//clever thing that converts your user name to lizard
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/space.css">
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
	
	//create the Lizards table if it doesn't already exist
	$sql = "CREATE TABLE IF NOT EXISTS Lizards (
			name varchar(30) NOT NULL,
			password VARCHAR(30) NOT NULL
			)";
	if ($conn->query($sql) === false ){
		echo "Error creating table: " . $conn->error;
	}
	
	//see if the user is already in the Lizards table
	$name;
	$pass;
	if( !isset($_SESSION["username"]) ){
		$name = $_GET["name"];
		$pass = $_GET["password"];
		$name = rtrim($name);
		$pass = rtrim($pass);
		$_SESSION["username"] = $name;
		$_SESSION["password"] = $pass;
	}
	else{
		$name = $_SESSION["username"];
		$pass = $_SESSION["password"];
	}
	$sql = "SELECT * FROM Lizards 
			WHERE Lizards.name = '$name' and
					Lizards.password = '$pass'
			";
	$conn = new mysqli( $servername, $username, $password, $db );
	$rslt = $conn->query($sql);
	
	//if they aren't in the table put them in it.
	if(!$rslt){
		$sql = "INSERT INTO Lizards (name, password) 
				VALUES ( '$name', '$pass' )";
		if( $conn->query($sql) === false ) {
			echo "Error: ".$sql."<br/>".$conn->error;
		}
		echo "Welcome $name to the Wonderful World of Space Reptiles!</br>";
	}
	else if( $rslt->num_rows == 0 ){
		$sql = "INSERT INTO Lizards (name, password) 
				VALUES ( '$name', '$pass' )";
		if( $conn->query($sql) === false ){
			echo "Error: ".$sql."<br/>".$conn->error;
		}
		echo "Welcome, $name, to the Wonderful World of Space Reptiles!</br>";
	}
	else{
		//this happens if the user is already in the lizards table.
		echo "Welcome back $name!<br/>";
	}
	
	/*
	//this will print out all the names and passwords of the Lizards
	//in the Lizards table.  Probably best if users don't see this query
	//it's good for testing though
	$conn = new mysqli( $servername, $username, $password, $db );
	$sql = "SELECT * FROM Lizards";
	$rslt = $conn->query($sql);
	if ($rslt) {
		$row = $rslt->fetch_assoc();
		while( $row ){
			echo "Name: ".$row["name"]."\tPassword: ".$row["password"]."<br/>";
			$row = $rslt->fetch_assoc();
		}
	}*/
?>
</p>
	<form action = "story/story1.php" method="GET">
	<button class = "button" type="submit" value="start">
		<b>Start Your Reptilian Adventure</b>
	</button>
	</form>
	
	<form action = "contact/contact.php" method="GET">
	<button class = "button" type="submit" value="start">
		<b>Contact the Lizard God</b>
	</button>
	</form>
	
	<form action = "../logon.php" method="GET">
	<button class = "button" type="submit" value="start">
		<b>Log Out</b>
	</button>
	</form>
	
<p class = "four"><b>
<?php
	include("editdistance.php");
	editdistance("LIZARD", strtoupper($_SESSION["username"]));
?>
</b></p>
</body>
</html>