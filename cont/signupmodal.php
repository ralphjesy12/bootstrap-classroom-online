<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<div id="signupModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Sign Up Now</h3>
  </div>
  <div class="modal-body">
    <form id="myForm" method="POST" action="cont/signup.php" accept-charset="UTF-8">
										<legend><h5>Basic Info</h5></legend>
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Firstname" name="fname">
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Lastname" name="lname"><br/>
										<input style="margin-bottom: 15px;" type="email" required="required" placeholder="Email Address"  name="eml"><small class="muted" style="margin-bottom: 15px;margin-left: 5px;">Type your working email address.</small>
										<legend><h5>User Account</h5></legend>
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="StudID e.g. 2013XXXX-XXXX" name="uname">
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Username" name="nick">
										<input style="margin-bottom: 15px;" type="password" required="required" placeholder="Password"  name="pass">
										<input style="margin-bottom: 15px;" type="password" required="required" placeholder="Confirm Password"  name="cpass"><br/>
										<button class="btn btn-success" id="submit">Sign Up</button>
								
								<div id="ack" class="alert hidden"></div>
								</form>
  </div>
  <div class="modal-footer">
    <button id="createEventBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button onclick="goTo()" class="btn btn-success">Already a student? Login Now</button>
	
  </div>
</div>
<script>
function goTo(){
	window.location.assign("index.php");

}
$("#submit").click( function(){
 
 $(this).append("<img src='; echo "'img/loading.gif'"; echo "id='loader'";echo ' />");
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
</script>';


?>