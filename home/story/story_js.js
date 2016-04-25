$(document).on("ready",function(){
	//add a button that will take users from the story to the home page
	$("body").append( "<form style=\"font-size:70%;width:30%;margin-left:35%;\" action = \"../home1.php\" method=\"GET\"><button class = \"button\" type=\"submit\" value=\"start\"><b>home</b></button></form>");

	//change the size of the font if the window size changes
	var startwid = $(window).width();
	var currwid;
	var startpxs = $("body").css("font-size");
	startpxs = startpxs.substring(0,startpxs.length-2);
	startpxs = parseInt(startpxs);
	$(window).on("resize", function(){
		currwid = $(window).width();
		var pct = (currwid/startwid);
		var pxs = startpxs*pct;
		$("body").css("font-size", pxs+"px");
	});
});