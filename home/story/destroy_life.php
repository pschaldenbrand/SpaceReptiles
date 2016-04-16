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
	story_header("Life, as Dull and Melancholy as it is, Probably Wasn't Worth Destroying!");
	story_img("../../space_pics/destroy.jpg");
	//opt 1
	story_option("Restore Life and Redeem Yourself After Such a Horrible Idea?",
				"story1.php");
	//next
	include("addToStory.php");
	?>
</body>
</html>