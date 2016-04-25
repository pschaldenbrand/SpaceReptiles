<?php
//Written by Peter Schaldenbrand
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
	include("story_functions.php"); 
	$n = $_SESSION["username"];
	story_header("Woah, You Created Life on Mars!
					You're just like Matt Damon, $n!");
	story_img("../../space_pics/life.jpg");
	story_option("Suppress a Coup d'état", 
				"coup.php");
	story_option("Start a Lizard Family", 
				"family.php");
	story_option("Leave Mars!",
				"story1.php");
?>
</body>
</html>