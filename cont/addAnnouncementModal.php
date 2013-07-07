<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<script src="js/bootstrap-datepicker.js"></script>
<div id="addAnnouncementModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Add New Announcement</h3>
  </div>
  <div class="modal-body">
    <form id="AnnouncementForm" class="form-horizontal" action="cont/newAnnouncement.php" method="POST">
  <fieldset>
    <div id="legend">
      <h3>Basic</h3>
    </div>
    <div class="control-group">
      <label class="control-label"  for="atitle">Announcement Title</label>
      <div class="controls">
        <input type="text" id="atitle" name="atitle" placeholder="" required="required" class="input-xlarge">
        <input type="hidden" id="cid1" name="cid1" value="'.$cid.'" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="adesc">Announcement Description</label>
		<div class="controls">
            <textarea rows="3" id="adesc" name="adesc" class="input-xlarge" required="required" ></textarea>
		</div>
    </div>
	
 
  </fieldset>

  </form>
  </div>
  <div id="ackAnnouncement" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="createAnnouncementBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="createAnnouncement" type="submit" class="btn btn-success">Create Announcement</button>
  </div>
</div>
<script>

$("#createAnnouncementBackBtn").click( function(){
	location.reload();
});

$("#createAnnouncement").click( function(){
 
	$(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />");
	 $.post( $("#AnnouncementForm").attr("action"),
	         $("#AnnouncementForm :input").serializeArray(),
			 function(info) {
			 if(info=="<strong>Creation Failed.</strong> Try again." || info=="Please fill out completely the form"){
				$("#ackAnnouncement").removeClass("hidden");
			   $("#ackAnnouncement").empty();
			   $("#ackAnnouncement").html(info);
			 }else{
				location.reload();
				}
				
				$("#loader").remove();
			 });
 
	$("#AnnouncementForm").submit( function() {
	   return false;	
	});
 
});



function clearAnnouncementForm() {
	$("#AnnouncementForm :input").each( function() {
	      $(this).val("");
		  
	});
 
}
</script>';


?>