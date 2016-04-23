

$(document).ready(function(){
	displayMessages();
	
});
$("#refresh").click( function(){
		console.log("refreshing");
		displayMessages();
} );
function displayMessages(){
	console.log("in display");
	$.ajax({url: "getMessages.php", type:"POST", dataType:"html",
		success: function( data ){
			console.log("displaying messages");
			console.log(data);
			$("#messages").html( data);
		}
	});
}
