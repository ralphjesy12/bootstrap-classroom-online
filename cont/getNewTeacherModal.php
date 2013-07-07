<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<div id="createTeacherModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Register Teacher</h3>
  </div>
  <div class="modal-body">
    <form id="myForm" method="POST" action="cont/regteach.php" accept-charset="UTF-8">
										<legend><h5>Basic Info</h5></legend>
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Firstname" name="fname">
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Lastname" name="lname"><br/>
										<input style="margin-bottom: 15px;" type="email" required="required" placeholder="Email Address"  name="eml"><br/>
										<legend><h5>User Account</h5></legend>
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Faculty ID e.g. 2012-2936538" name="uname">
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Username" name="nick">
										<input style="margin-bottom: 15px;" type="password" required="required" placeholder="Password"  name="pass">
										<input style="margin-bottom: 15px;" type="password" required="required" placeholder="Confirm Password"  name="cpass"><br/>
										<button class="btn btn-success" id="submit">Add Teacher</button>
								
								<div id="ack" class="alert hidden"></div>
								</form>
  </div>
  <div class="modal-footer">
    <button id="createEventBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
	
  </div>
</div>
<script>
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

$("#createEventBackBtn").click(function(){
	location.reload();
	});
function clear() {
 
	$("#myForm :input").each( function() {
	      $(this).val("");
	});
 
}
</script>';


?>