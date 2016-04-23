<?php
//Written by Peter Schaldenbrand
/*
This is the login page. the user enters a username
and a password.
*/
	session_start();
	session_unset();
	session_destroy();
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		.enterinfo{
			width: 50%;
			padding: 6px 20px;
			margin-bottom: 4%;
			margin-top: 0%;
			box-sizing: border-box;
			border: 3px solid rgb(64,0,135);
			border-radius: 6px;
			background-color: rgba(64,0,135,0.5);
			color: lightgreen;
			font-size: 30px;
			font-family: camp;
		}
		div{
			margin-top: 3%;
			padding-left: 0%;
			padding-right: 0%;
			padding-top: 0%;
			padding-bottom: 0%;
			margin-left: 20%;
			margin-right: 20%;
			margin-bottom: 2%;
			background-color: lightgreen;
			border-style: solid;
		}
		input[type=submit] {
			backgorund-color: rgba(64,0,135,0.3);
			margin: 3% 3%;
			color: rgb(64,0,135);
			padding: 2% 15%;
			border-radius: 5px;
		}
		form.logon{
			background-image: url("space_pics/lizard1.jpg");
			background-size: 225%;
			display: block;
			margin-top: 0%;
			margin-bottom; 0%;
			background-position: center;
		}
		p.logon{
			margin-top: 10%;
			margin-bottom: 0%;
			padding-left: 5%;
			padding-right: 5%;
			background-color: lightblue;
			border-style: solid;
			font-size: 45px;
			display: inline-block;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="CSS/space.css">
	<title>SPACE LIZARDS FROM SPACE</title>
</head>
<body>
<div>
	<form class = "logon" action = "home/home1.php" method = "GET">
		<p class = "logon"><b>What is your username?</b></p></br>
		<input type = "text" class="enterinfo" name = "name" size = "30" maxlength = "30"><br/>
		<p class = "logon"><b>What is your password?</b></p></br>
		<input type = "password" class="enterinfo" name = "password" size = "30" maxlength = "30"><br/>
		<button class = "button" type="submit" value="start">
			<b>Logon  :]</b>
		</button>
    </form>
</div>
</body>
</html>