<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

require_once "phpuploader/include_phpuploader.php"; 

echo '
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	function doStart1()
	{
		var uploadobj = document.getElementById("myuploader1");
		if (uploadobj.getqueuecount() > 0)
		{
			uploadobj.startupload();
		}
	}
	</script>
<div id="addLessonModal" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Add New Lesson</h3>
  </div>
  <div class="modal-body">
    <form id="lessForm" class="form-horizontal" rel="cont/newLesson.php" method="POST">
  <fieldset>
    <div id="legend">
      <h3>Basic</h3>
    </div>
    <div class="control-group">
      <label class="control-label"  for="atitle">Lesson Title</label>
      <div class="controls">
        <input type="text" id="atitle" name="atitle" placeholder="" required="required" class="input-xlarge">
        <input type="hidden" id="cid1" name="cid1" value="'.$cid.'" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="adesc">Lesson Description</label>
		<div class="controls">
            <textarea rows="3" id="adesc" name="adesc" class="input-xlarge" required="required" ></textarea>
		</div>
    </div>
	<div class="control-group">
      <label class="control-label" for="lessDatepick">Discussion Date</label>
		<div class="controls">
            <div class="input-append date" id="lessDatepick" data-date="'.date("Y-m-j").'" data-date-format="yyyy-mm-dd">
				<input id="adate" name="adate" class="span2" size="16" type="text" value="'.date("Y-m-d").'" required="required" >
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
		</div>
    </div>
	<hr/>
	<div class="control-group">
      <label class="control-label" for="lessDatepick">Attach a File</label>
		<div class="controls">
		
           ';
				
					$uploader1=new PhpUploader();
					$uploader1->MaxSizeKB=10240;
					$uploader1->Name="myuploader1";
					$uploader1->InsertText="Browse (Max 10M)";
					$uploader1->AllowedFileExtensions="*.jpg,*.png,*.gif,*.txt,*.zip,*.rar,*.doc,*.docx,*.xls,*.xlsx,*.ppt,*.pptx";	
					$uploader1->MultipleFilesUpload=true;
					$uploader1->ManualStartUpload=true;
					$uploader1->InsertButtonID="myuploaderButton1";
					$uploader1->SaveDirectory="less_uploads";
					$uploader1->Render();
					
			
			//Where'd the files go?
echo '
		<button id="myuploaderButton1" onclick="return false;">Browse (Max 10M)</button>
		<hr><span data-toggle="tooltip" title="*.jpg,*.png,*.gif,*.txt,*.zip,*.rar, *.doc,*.docx,*.xls,*.xlsx,*.ppt,*.pptx">Allowed File Types </span><br/>
    </div>
 
  </fieldset>

  </form>
  </div>
  <div id="ackless" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="createlessBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="createless" type="submit" class="btn btn-success" >Create Lesson</button>
  </div>
</div>
<script>
$("#lessDatepick").datepicker();

$("#createlessBackBtn").click( function(){
	location.reload();
});

$("#createless").click( function(){
		$("#cid1").attr("rel",1);
			  
		$("#ackless").empty();
		
 $(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />");
	 $.post( $("#lessForm").attr("rel"),
	         $("#lessForm :input").serializeArray(),
			 function(info) {
			 if(info=="<strong>Lesson Title exist.</strong> Try another one."){
				$("#ackless").removeClass("hidden");
			   $("#ackless").empty();
			   $("#ackless").html(info);
				}else{
			 doStart1();
				$("#ackless").removeClass("hidden");
			   $("#ackless").empty();
			   $("#ackless").html(info);
				}
				$("#loader").remove();
			 });
 
	$("#lessForm").submit( function() {
	   return false;	
	});
 
});



function clearlessForm() {
	$("#lessForm :input").each( function() {
	      $(this).val("");
		  
	});
 
}
</script>

<script type="text/javascript">
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
	
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    }
  }
  if($("#cid1").attr("rel")==1){
  var cid = $("#cid1").val();
  var max = $("#navless").html();
xmlhttp.open("POST","cont/addlessUpload.php?f="+task.FileName+"&c="+cid+"&a="+max,true);


}else if($("#cid1").attr("rel")==0){
  var cid = $("#cid1").val();
  var max = $("#navassign").html();
xmlhttp.open("POST","cont/addAssignUpload.php?f="+task.FileName+"&c="+cid+"&a="+max,true);
}
xmlhttp.send();
$("#cid1").attr("rel",2);
	}
	</script> ';


?>