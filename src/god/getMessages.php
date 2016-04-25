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
	if($conn->connect_error) {
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
	if ($conn->query($sql) === false){
		echo "Error creating table: " . $conn->error;
	}
	//get all the comments that the users made
	$sql = "SELECT * FROM Comments
			ORDER BY time desc";
	$rslt = $conn->query($sql);
	
	//Display all the messages if there are any
	echo "<p class=\"message\"><p1 style=\"display:block;text-align:center;\">";
	echo "<b>All messages sent to the Lizard God</b></p1></p>";
	if ($rslt) {
		header('Content-type: text/html');
		$row = $rslt->fetch_assoc();
		while( $row ){
			echo "<p class = \"message\">";
			$usersname = $row["name"];
			$com = $row["comment"];
			$time = $row["time"];
			$row = $rslt->fetch_assoc();
			echo "<p1 style=\"display:block;text-align:left;\"><b>Name:</b>$usersname</p1>";
			echo "<b>Message:</b></br>";
			echo "<p1 style=\"margin-left: 10%;display:block;\">$com</p1>";
			echo "<b>Time: </b>$time";
			echo"</p><br/>";
		}
	}
	else{
		echo "Sorry, it appears you haven't sent any messages to God ... yet.";
	}
?>