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
	story_header("Welcome to Mars, $n!");
	story_img("../../space_pics/mars.jpg");
	//opt 1
	story_option("Create Life!", 
				"mars_life.php");
	//opt 2
	story_option("Drill for oil!", 
				"mars_oil.php");
	//opt 3
	story_option("Leave Mars!",
				"story1.php");
	//opt 4
	story_option("go see some penguins","123456_USER_MADE_PAGE.php");
	//next
	include("addToStory.php");
	?>
</body>
</html>