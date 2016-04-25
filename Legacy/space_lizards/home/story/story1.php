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
	story_option("Go to Mars!", 
				"mars.php");
	/*story_option("Assume the World's Troubles!", 
				"story1.php");*/
	story_option("Go on an Emotional Journey!",
				"emo_journey.php");
	story_option("Destroy all Life!",
				"destroy_life.php");
	story_option("Go back in Time and Stop the Big Bang!",
				"big_bang.php");
	story_option("Back to Home Page",
				"../home1.php");
	?>
</body>
</html>