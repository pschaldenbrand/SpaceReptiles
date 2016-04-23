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
	//opt 1
	story_option("Suppress a Coup d'état", 
				"coup.php");
	//opt 2
	story_option("Start a Lizard Family", 
				"family.php");
	//opt 3
	story_option("Leave Mars!",
				"story1.php");
	//next
	include("addToStory.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="story_js.js"></script>
</body>
</html>