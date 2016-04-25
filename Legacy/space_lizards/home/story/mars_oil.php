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
	story_header("Fossil Fuels are Terrible! You Ruined the Whole Planet!");
	story_img("../../space_pics/oil.jpg");
	story_option("Leave Mars!",
				"story1.php");
	?>
</body>
</html>