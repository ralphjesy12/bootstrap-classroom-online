$(".btnsend").click( function(){

	$(this).append("<img src='img/loading.gif' id='loader' />");
var rec = $('select[name="sender"]').val();
var msg = $('textarea[name="msg"]').val();
var sender = $('textarea[name="msg"]').attr("rel");
if(msg!=""){
	 $.post( "cont/newMessage.php",
	        { m : msg ,s : sender ,r : rec},
			 function(info) {
			 $('textarea[name="msg"]').val("");
			 $("#loader").remove();
			});
 }
 
});
