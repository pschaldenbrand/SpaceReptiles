<?php
	session_start();
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
	header("Location: lizardgod.php");
	exit;
?>