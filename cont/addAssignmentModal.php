<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

require_once "phpuploader/include_phpuploader.php"; 

echo '
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	function doStart()
	{
		var uploadobj = document.getElementById("myuploader");
		if (uploadobj.getqueuecount() > 0)
		{
			uploadobj.startupload();
		}
	}
	</script>
<div id="addAssignModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Add New Assignment</h3>
  </div>
  <div class="modal-body">
    <form id="AssignForm" class="form-horizontal" rel="cont/newAssign.php" method="POST">
  <fieldset>
    <div id="legend">
      <h3>Basic</h3>
    </div>
    <div class="control-group">
      <label class="control-label"  for="atitle">Assignment Title</label>
      <div class="controls">
        <input type="text" id="atitle" name="atitle" placeholder="" required="required" class="input-xlarge">
        <input type="hidden" id="cid1" name="cid1" value="'.$cid.'" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="adesc">Assignment Description</label>
		<div class="controls">
            <textarea rows="3" id="adesc" name="adesc" class="input-xlarge" required="required" ></textarea>
		</div>
    </div>
	<div class="control-group">
      <label class="control-label" for="assignDatepick">End of Submission</label>
		<div class="controls">
            <div class="input-append date" id="assignDatepick" data-date="'.date("Y-m-j").'" data-date-format="yyyy-mm-dd">
				<input id="adate" name="adate" class="span2" size="16" type="text" value="'.date("Y-m-d").'" required="required" >
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
		</div>
    </div>
	<div class="control-group">
      <label class="control-label" for="assignDatepick">Attach a File</label>
		<div class="controls">
		
           ';
				
					$uploader=new PhpUploader();
					$uploader->MaxSizeKB=10240;
					$uploader->Name="myuploader";
					$uploader->InsertText="Browse (Max 10M)";
					$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif,*.txt,*.zip,*.rar,*.doc,*.docx,*.xls,*.xlsx,*.ppt,*.pptx";	
					$uploader->MultipleFilesUpload=true;
					$uploader->ManualStartUpload=true;
					
					$uploader->SaveDirectory="assign_uploads";
					$uploader->Render();
					
			
			//Where'd the files go?
echo '
		<hr><span data-toggle="tooltip" title="*.jpg,*.png,*.gif,*.txt,*.zip,*.rar, *.doc,*.docx,*.xls,*.xlsx,*.ppt,*.pptx">Allowed File Types </span><br/>
    </div>
 
  </fieldset>

  </form>
  </div>
  <div id="ackAssign" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="createAssignBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="createAssign" type="submit" class="btn btn-success" >Create Assign</button>
  </div>
</div>
<script>
$("#assignDatepick").datepicker();

$("#createAssignBackBtn").click( function(){
	location.reload();
});

$("#createAssign").click( function(){
	$("#cid1").attr("rel",0);
			  
		$("#ackAssign").empty();
		
 $(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />");
	 $.post( $("#AssignForm").attr("rel"),
	         $("#AssignForm :input").serializeArray(),
			 function(info) {
			 if(info=="<strong>Assigment Title exist.</strong> Try another one."){
				$("#ackAssign").removeClass("hidden");
			   $("#ackAssign").empty();
			   $("#ackAssign").html(info);
				}else{
			 doStart();
				$("#ackAssign").removeClass("hidden");
			   $("#ackAssign").empty();
			   $("#ackAssign").html(info);
				}
				
				
				$("#loader").remove();
			 });
 
	$("#AssignForm").submit( function() {
	   return false;	
	});
 
});



function clearAssignForm() {
	$("#AssignForm :input").each( function() {
	      $(this).val("");
		  
	});
 
}
</script>
';


?>