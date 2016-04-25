<?php
//Written by Peter Schaldenbrand

//This page displays a form for the user to enter text to send to
//the lizard god, and also displays the messages sent by other lizards
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/space.css">
	<title>SPACE LIZARD GOD FROM SPACE</title>
	<style>
		.messagebox{
			margin-top: 2%;
			padding-left: 1%;
			padding-right: 1%;
			margin-left: 5%;
			margin-right: 5%;
			background-color: rgba(64,0,135, 0.75);
			border-style: solid;
			border-color: lightgreen;
			font-size: 35px;
			letter-spacing: 7px;
		}
		p.message {
			text-align: left;
			margin-left: 1%;
			margin-top: 1%;
			padding-left: 5%;
			padding-right: 5%;
			width:70%;
			background-color: lightblue;
			border-style: solid;
			border-color:lightgreen;
			font-size: 45px;
			display: inline-block;
		}
		textarea{
			font-family: camp;
			font-size: 50%;
			margin-left:10%;
			font-align:left;
			width:50%;
			height:20%;
			background-color: rgb(250,255,200);
		}
		form.textform{
			padding: 0 0;
			display:inline-block;
			text-align: left;
			margin-top:1%;
		}
		p.title{
			width: 70%;
			margin-left:15%;
			text-align:center;
			background-color: lightblue;
			border-style: solid;
			font-size: 55%;
			display: inline-block;
			margin-top:0%;
		}
		.button1{
			-webkit-transition-duration: 0.4s;
			transition-duration: 0.6s;
			background-color: lightblue;
			display: block;
			width: 15%;
			margin-left:70%
			text-align:center;
			height: 30%;
			border: 3px solid rgb(64,0,135);
			font-family: camp;
			font-size: 45%;
			color: rgb(64,0,135);
			border-radius: 15%;
			margin-top:0%;
			margin-bottom:0%;
		}
	</style>
</head>
<body>
	<form action="../home/home1.php" method="GET">
		<button class="button1" type="submit" value="start">
		home
		</button>
	</form>
	
	<button id="refresh" class="button1" type="submit">
		Refresh
	</button>
	
	<form class="textform" action="send_message.php" method="POST">
		<p class="title"><b>
			What would you like to say to Extraterestial Reptile God?
		</b></p>
		<textarea name="comment" value="message" cols=40 rows=6>Type here.</textarea>
		<button class="button" type="submit" value="start">
			<b>Send this to God</b>
		</button>
    </form>	

	<p class="messagebox" id="messages">

	</p>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="messages.js"></script>
</body>
</html>