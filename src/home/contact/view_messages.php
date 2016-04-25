<?php
/*
Written by Peter Schaldenbrand

This is the page that displays all the previous messages
that the user has sent to the lizard god
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
	
	//get all the comments that the user made
	$name = $_SESSION["username"];
	$sql = "SELECT * FROM Comments
			WHERE Comments.name = '$name'
			ORDER BY time desc";
	$rslt = $conn->query($sql);
	
	//Display all the messages if there are any
	include("../story/story_functions.php");
	story_header("Your messages to the Extraterestrial Lizard God");
	if ($rslt) {
		$row = $rslt->fetch_assoc();
		while( $row ){
			?><p class = "one"><?php
			echo "<b>Message:</b><br/>".$row["comment"]."<br/><b>Time: </b>".$row["time"];
			$row = $rslt->fetch_assoc();
			?></p><br/><?php
		}
	}
	else{
		echo "Sorry, it appears you haven't sent any messages to God ... yet.";
	}
	
?>
<form action = "../home1.php" method = "GET">
	<button class = "button" type="submit" value="start">
	<b>Return to the Home Page</b>
	</button>
</form>
<form action = "contact.php" method = "GET">
	<button class = "button" type="submit" value="start">
	<b>Send more messages to God</b>
	</button>
</form>