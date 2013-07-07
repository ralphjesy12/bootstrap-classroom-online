<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<script src="js/bootstrap-datepicker.js"></script>
<div id="addEventModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Add New Event</h3>
  </div>
  <div class="modal-body">
    <form id="eventForm" class="form-horizontal" action="cont/newEvent.php" method="POST">
  <fieldset>
    <div id="legend">
      <h3>Basic</h3>
    </div>
    <div class="control-group">
      <label class="control-label"  for="etitle">Event Title</label>
      <div class="controls">
        <input type="text" id="etitle" name="etitle" placeholder="" required="required" class="input-xlarge">
        <input type="hidden" id="cid" name="cid" value="'.$cid.'" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="edesc">Event Description</label>
		<div class="controls">
            <textarea rows="3" id="edesc" name="edesc" class="input-xlarge" required="required" ></textarea>
		</div>
    </div>
	
    <div class="control-group">
      <label class="control-label" for="edesc">Event Date</label>
		<div class="controls">
            <div class="input-append date" id="eventDatePick" data-date="'.date("Y-m-j").'" data-date-format="yyyy-mm-dd">
				<input id="edate" name="edate" class="span2" size="16" type="text" value="'.date("Y-m-d").'" required="required" >
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
		</div>
    </div>
 
  </fieldset>

  </form>
  </div>
  <div id="ackEvent" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="createEventBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="createEvent" type="submit" class="btn btn-success">Create Event</button>
  </div>
</div>
<script>
$("#eventDatePick").datepicker();
$("#createEventBackBtn").click( function(){
	location.reload();
});

$("#createEvent").click( function(){
	$(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />");
	 $.post( $("#eventForm").attr("action"),
	         $("#eventForm :input").serializeArray(),
			 function(info) {
			 
			 if(info=="<strong>Creation Failed.</strong> Try again." || info=="Please fill out completely the form"){
				$("#ackEvent").removeClass("hidden");
			   $("#ackEvent").empty();
			   $("#ackEvent").html(info);
			 }else{
				location.reload();
				}
				
				$("#loader").remove();
			 });
 
	$("#eventForm").submit( function() {
	   return false;	
	});
 
});



function clearEventForm() {
	$("#eventForm :input").each( function() {
	      $(this).val("");
		  
	});
 
}
</script>';


?>