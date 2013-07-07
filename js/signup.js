$("#loginbtn").click( function(){
 $(this).append('<img src="img/loading.gif" id="loader" />');
	 $.post( $("#myForm2").attr("action"),
	         $("#myForm2 :input").serializeArray(),
			 function(info) {
			 if((info == "<strong>Welcome Administrator.</strong> <br/>Please wait...") || (info == "<strong>Welcome Student.</strong> <br/>Please wait...") || (info == "<strong>Welcome Teacher.</strong> <br/>Please wait...")){
					var url="profile.php";
					window.location.assign(url);
				}else{
			 
				$("#ack2").removeClass("hidden");
			   $("#ack2").empty();
			   $("#ack2").html(info);
				clear1();
				}
				$("#loader").remove();
			 });
 
	$("#myForm2").submit( function() {
	   return false;	
	});
 
});

$("#loginbtn2").click( function(){
 
 $(this).append('<img src="img/loading.gif" id="loader" />');
	 $.post( $("#myForm3").attr("action"),
	         $("#myForm3 :input").serializeArray(),
			 function(info) {
	if((info == "<strong>Welcome Administrator.</strong> <br/>Please wait...") || (info == "<strong>Welcome Student.</strong> <br/>Please wait...")){
					var url="profile.php";
					window.location.assign(url);
				}else{
				alert("false");
				$("#ack3").removeClass("hidden");
			   $("#ack3").empty();
			   $("#ack3").html(info);
				clear2();
				}
				
				$("#loader").hide();
			 });
 
	$("#myForm3").submit( function() {
	   return false;	
	});
 
});

function clear1() {
 
	$("#myForm2 :input").each( function() {
	      $(this).val("");
	});
 
}
function clear2() {
 
	$("#myForm3 :input").each( function() {
	      $(this).val("");
	});
 
}