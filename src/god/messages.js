

$(document).ready(function(){
	displayMessages();
	
	//change the size of the font if the window size changes
	var startwid = $(window).width();
	var currwid;
	var startpxs = $("body").css("font-size");
	startpxs = startpxs.substring(0,startpxs.length-2);
	startpxs = parseInt(startpxs);
	$(window).on("resize", function(){
		currwid = $(window).width();
		var pct = (currwid/startwid);
		var pxs = startpxs*pct*0.8;
		$("body").css("font-size", pxs+"px");
	});
});
$("#refresh").click( function(){
	//everytime they hit the refresh button, redisplay the messages
		displayMessages();
} );
function displayMessages(){
	//ajax call to getMessages.php to get the messages from the database
	$.ajax({url: "getMessages.php", type:"POST", dataType:"html",
		success: function( data ){
			$("#messages").html( data);
		}
	});
}
