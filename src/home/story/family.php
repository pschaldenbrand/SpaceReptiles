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
	<?php include("story_functions.php"); 
	$n = $_SESSION["username"];
	story_header("$n, What a Bad Idea, Families are for Amphibians.");
	story_img("../../space_pics/family.jpg");
	//opt 1
	story_option("Leave Mars!",
				"story1.php");
	//next
	include("addToStory.php");
	?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="story_js.js"></script>
</body>
</html>