$("#submit").click( function(){
 
 $(this).append('<img src="img/loading.gif" id="loader" />');
	 $.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
			 function(info) {
				$("#ack").removeClass("hidden");
			   $("#ack").empty();
			   $("#ack").html(info);
				clear();
				$("#loader").remove();
			 });
 
	$("#myForm").submit( function() {
	   return false;	
	});
 
});

function clear() {
 
	$("#myForm :input").each( function() {
	      $(this).val("");
	});
 
}