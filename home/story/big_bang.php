<?php
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
	story_header("Dang! I Can't Believe You Did That, $n.
					That Was a Terrible Idea; Now You Don't Exist!");
	story_img("../../space_pics/bigbang.jpg");
	//opt 1
	story_option("Go Back in Time and Stop Yourself From Going Back in Time and Stopping the Big Bang?",
				"story1.php");
	//next
	include("addToStory.php");
	?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="story_js.js"></script>
</body>
</html>