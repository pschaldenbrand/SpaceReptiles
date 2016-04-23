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
	story_header("Wow $n, Such an Emotional Adventure!");
	story_img("../../space_pics/emojourney.jpg");
	//opt 1
	story_option("Exit This Highly Emotional Journey!",
				"story1.php");
	//next
	include("addToStory.php");
	?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="story_js.js"></script>
</body>
</html>