$(document).on("ready",function(){
	var s = $("#dist").html();
	$("#dist").html("");
	/*$.ajax({url: "editDistance.php", type:"POST", dataType:"html",
		success: function( data ){
			console.log("displaying messages");
			console.log(data);
			$("#messages").html( data);
		}
	});*/
	s = s.replace("\n","");
	s = s.replace("<b>","");
	s = s.replace("</b>","");
	s = s.split("<br>");
	for( var k = 0; k < s.length-1; k++){
		$("#dist").append("</br>");
	}
	//console.log(s);
	var j = 0;
	setInterval( function(){ 
		$("#dist").html("");
		for( var i = 0; i < s.length-1; i++){
			if( i <= j ){
				$("#dist").append(s[i]+"</br>");
			}
			else{
				$("#dist").append("</br>");
			}
		}
		///console.log($("#dist").html());
		j++;
		if( j == s.length-1){
			j = 0;
		}
	} 
	, 2);
	
	//change the size of the font if the window size changes
	var startwid = $(window).width();
	var currwid;
	var startpxs = $("body").css("font-size");
	var startpxs2 = $("#dist").css("font-size");
	startpxs = startpxs.substring(0,startpxs.length-2);
	startpxs = parseInt(startpxs);
	startpxs2 = startpxs2.substring(0,startpxs2.length-2);
	startpxs2 = parseInt(startpxs2);
	var startpxs3 = $("#title").css("font-size");
	startpxs3 = startpxs3.substring(0,startpxs3.length-2);
	startpxs3 = parseInt(startpxs3);
	$(window).on("resize", function(){
		currwid = $(window).width();
		var pct = (currwid/startwid);
		var pxs = startpxs*pct;
		var pxs2 = startpxs2*pct;
		var pxs3 = startpxs3*pct;
		$("body").css("font-size", pxs+"px");
		$("#dist").css("font-size",pxs2+"px");
		$("#title").css("font-size",pxs3+"px");
	});
});