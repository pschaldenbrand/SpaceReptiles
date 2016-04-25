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
<div>
	<form action = "send_comment.php" method = "POST">
		<p class = "one"><b>
			What would you like to say to Extraterestial Reptile God?
		</b></p>
		<textarea name = "comment" cols=40 rows=6>
			Type here.
		</textarea>
		<button class = "button" type="submit" value="start">
			<b>Send this to God</b>
		</button>
    </form>
	
	<form action = "../home1.php" method = "GET">
		<button class = "button" type="submit" value="start">
			<b>Return to the Home Page</b>
		</button>
	</form>
	
	<form action = "view_messages.php" method = "GET">
		<button class = "button" type="submit" value="messages">
			<b>View my previous messages to Lizard God</b>
		</button>
    </form>
</div>
</body>
</html>