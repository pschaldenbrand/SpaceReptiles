
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
	story_header("INSERT HEADER HERE");
	story_img("uploaded_pics/fsadsadf-img.jpg");
	//opt 1
	story_option("Go Back?", "yay_USER_MADE_PAGE.php");//next
include("addToStory.php");
?>
</body>
</html>