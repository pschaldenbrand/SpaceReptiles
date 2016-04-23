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
	story_header("Hello Space Lizard $n!");
	?></body><?php
	story_img("../../space_pics/story1.jpg");
	?><body><?php
	//opt 1
	story_option("Go to Mars!", 
				"mars.php");
	//opt 2
	story_option("Go on an Emotional Journey!",
				"emo_journey.php");
	//opt 3
	story_option("Destroy all Life!",
				"destroy_life.php");
	//opt 4
	story_option("Go back in Time and Stop the Big Bang!",
				"big_bang.php");
	//opt 5
	story_option("Back to Home Page",
				"../home1.php");
	//next
	include("addToStory.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="story_js.js"></script>
</body>
</html>