<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<div id="newStudIdModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Register a Student Id</h3>
  </div>
  <div class="modal-body">
   
										<fieldset>
    <h4>Student Id</h4>
    <input name="s11" type="text" style="width:35px;" placeholder="0000" maxlength="4"><strong> &minus; </strong>
    <input name="e11" type="text" class="span1" placeholder="0000000" maxlength="7">
    <span class="help-block">Type a complete Student ID you want to register. (e.g. 2012-XXXXXXX)</span>
    <button id="submit1" type="submit" class="btn btn-success">Create</button>
  </fieldset>
										<fieldset>
    <h4>Batch Mode</h4>
    <label>Start Id Range</label>
    <input name="s1" type="text" style="width:35px;" placeholder="0000" maxlength="4"><strong> &minus; </strong>
    <input name="e1" type="text" class="span1" placeholder="0000000" maxlength="7">
    <label>End Id Range</label>
    <input name="s2" type="text" style="width:35px;" placeholder="0000" maxlength="4"><strong> &minus; </strong>
    <input name="e2" type="text" class="span1" placeholder="0000000" maxlength="7">
    <span class="help-block">Start ID must be less than the End ID</span>
    <button id="submit2" type="submit" class="btn btn-success">Batch Create</button>
  </fieldset>
  </div>
  <div class="modal-footer">
  <div id="ack1" class="alert hidden span3"></div>
    <button id="createEventBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
	</div>
</div>
<script>
$("input[name='; echo "'"; echo 's1'; echo "'";echo ']").keyup(function(){
	s2 : $("input[name='; echo "'"; echo 's2'; echo "'";echo ']").val($("input[name='; echo "'"; echo 's1'; echo "'";echo ']").val());

});

$("#submit2").click( function(){

 $(this).append("<img src='; echo "'img/loading.gif'"; echo "id='loader'";echo ' />");
	 $.post( "cont/regStud1.php",
	         {s1 : $("input[name='; echo "'"; echo 's1'; echo "'";echo ']").val(),
			 e1 : $("input[name='; echo "'"; echo 'e1'; echo "'";echo ']").val(),
			 s2 : $("input[name='; echo "'"; echo 's2'; echo "'";echo ']").val(),
			 e2 : $("input[name='; echo "'"; echo 'e2'; echo "'";echo ']").val()
			 },
			 function(info) {
				$("#ack1").removeClass("hidden");
			   $("#ack1").empty();
			   $("#ack1").html(info);
				clear();
				$("#loader").remove();
			 });
 
 
});
$("#submit1").click( function(){

 $(this).append("<img src='; echo "'img/loading.gif'"; echo "id='loader'";echo ' />");
	 $.post( "cont/regStud.php",
	         {s11 : $("input[name='; echo "'"; echo 's11'; echo "'";echo ']").val() ,
			 e1 : $("input[name='; echo "'"; echo 'e11'; echo "'";echo ']").val(),
			 },
			 function(info) {
				$("#ack1").removeClass("hidden");
			   $("#ack1").empty();
			   $("#ack1").html(info);
				clear();
				$("#loader").remove();
			 });
 
 
});

$("#createEventBackBtn").click(function(){
	location.reload();
	});
function clear() {
 
	$("#newStudIdModal :input").each( function() {
	      $(this).val("");
	});
 
}
</script>';


?>