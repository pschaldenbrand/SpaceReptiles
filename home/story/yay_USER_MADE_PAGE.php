
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
	story_img("uploaded_pics/yay-img.jpg");
	//opt 1
	story_option("Go Back?", "story1.php");
	//opt 2
	story_option("safdfsasfad","fsadsadf_USER_MADE_PAGE.php");
	//next
include("addToStory.php");
?>

<form action="" method="POST">
	<button class="button" type="submit" value="Delete?"> Delete this story?</button>
</form>

</body>
</html>