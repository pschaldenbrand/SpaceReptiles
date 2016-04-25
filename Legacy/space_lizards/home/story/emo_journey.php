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
	story_option("Exit This Highly Emotional Journey!",
				"story1.php");
	?>
</body>
</html>