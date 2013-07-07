<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  
	  require_once "mod/assignments.php";
	  require_once "mod/user.php";
		
		require_once "phpuploader/include_phpuploader.php"; 
		$assignment = new assignments();
		$user11 = new user();
		$rAssign = $assignment->find_assignmentByCourse($cid);
		$rAcount = mysql_num_rows($rAssign);
		echo '<script>$("#navassign").html('.$rAcount.');</script>';
		if($rAcount>0){
		echo '<table class="tabletable-condensed " style="width:100%;">';
		WHILE($dAssign = mysql_fetch_array($rAssign)):
					$atitle = substr($dAssign['asTitle'], 0, 22);
	$date = new DateTime($dAssign['asCdate']);
	$ocdate = $date->format('F-d-Y');
	$date = new DateTime($dAssign['asEndDate']);
	$oedate = $date->format('F-d-Y');
	
	$datenow = date('F-d-Y');
			echo '<tr>
					<td><span class="label label-success  text-center span2">'.$ocdate.'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$atitle.'</strong></span></td>
					<td width=300px><span class="text-success span3">Due by <strong>'.$oedate.'</strong></span></td>
					<td class="span3">'; 
					if($type=="Student" || $type=="Administrator" || $type=="Teacher"){
					echo'
					
					<div id="viewAssignment'.$dAssign['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">'.$dAssign["asTitle"].'</h3>
  </div>
  <div class="modal-body"><h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$ocdate.'</span></h4><br/>'.$dAssign["asDesc"].'
  <br/><hr><span class="text-success"><strong >Attachments</strong> '; 
  $rAssign2 = $assignment->find_assignuploadsByAssignId($dAssign['id'],$cid);
  WHILE($dAssign2 = mysql_fetch_array($rAssign2)):
	echo '<li><a href="assign_uploads/'.$dAssign2['filename'].'" target="_blank">'.$dAssign2['filename'].'</a></li>';
  
  ENDWHILE;
  if($type=="Student"){


 echo ' <div class="control-group">
		<div class="controls"> ';
		if(mysql_num_rows($assignment->find_assignsubmissions($cid,$dAssign['id'],$_SESSION['uid']))<1){
		 $date1 = new DateTime($datenow);
$date2 = new DateTime($oedate);
$date3 = $date1->diff($date2); 
$oedate3 = $date3->format('%R%a');

if(($oedate3)>-1){
					$uploader=new PhpUploader();
					$uploader->MaxSizeKB=10240;
					$uploader->Name="myuploader";
					$uploader->AllowedFileExtensions="doc,docx,xls,xlsx,ppt,pptx,pub,zip,rar,jpeg,jpg,png,gif,bmp,pdf,txt,php,html,js,css";        				
					$uploader->MultipleFilesUpload=false;
					$uploader->ManualStartUpload=true;
					$uploader->MaxFilesLimit=1;
					$uploader->MaxFilesLimitMsg="Only one file is allowed per submission."; 
					$uploader->InsertButtonID="uploadbutton";  	  
					$uploader->UploadUrl="cont/uploadhandler.php";
					$uploader->Render();
echo '<hr><a class="btn btn-success" id="uploadbutton"><i class="icon-file icon-white"></i>Select a File</a>
		<a class="btn btn-success" rel="'.$dAssign["id"].'" id="uploadbutton2" onclick="doStart();return false;"><i class="icon-play icon-white"></i>&nbsp;Submit answer</a> ';
		
  }else{
  echo '<hr><a class="btn btn-success disabled" onclick="return false;"><i class="icon-warning-sign icon-white"></i>&nbsp;Date of Submission Ended</a>';
		
  }
		}else{
		echo '<hr><a class="btn btn-success disabled" onclick="return false;"><i class="icon-ok icon-white"></i>&nbsp;Answer Submitted</a>';
		}
   echo ' </div>
 
  </fieldset>
  </div>';
  }else{
	$getsubs = $assignment->find_assignsubmissionsbyassid($cid,$dAssign['id']);
		if(mysql_num_rows($getsubs)>0){
			echo '<hr><strong>Submissions</strong><br/><ul class="unstyled">';
			WHILE($dgetsubs = mysql_fetch_array($getsubs)):
				$subdate = new DateTime($dgetsubs['ts']);
				$ocdate21 = $subdate->format('G:ia');
				$ocdate22 = $subdate->format('F-d-Y');
				$submitter = $user11->check_byId($dgetsubs['studid']);
				$dsubmitter = mysql_fetch_array($submitter);
			echo '<li><span class="badge badge-success" title="'.$ocdate21.'"><i class="icon-calendar icon-white"></i>'.$ocdate22.'</span>&nbsp;&nbsp;<strong>'.ucfirst($dsubmitter['fname']).' '.ucfirst($dsubmitter['lname']).'</strong> : <a class="btn btn-success btn-mini" href="assign_submissions1/'.$dgetsubs['filename'].'" target="_blank"><i class="icon-download-alt icon-white"></i>Download</a></li>';
			ENDWHILE;
			echo '</ul>';
		}else{
			echo '<hr><strong>No Submissions Yet</strong><br/>';
		}
  
  }
  
  echo'<hr><span class="text-success">Due by <strong >'.$oedate.' </strong></span>
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>


<div id="deleteAssign'.$dAssign['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">Delete this Assignment?</h3>
  </div>
  <div class="modal-body">
	<h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$ocdate.'</span></h4><br/>'.$dAssign["asTitle"].'
	
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No, keep this Assign.</button>
	<button  rel="'.$dAssign['id'].'" class="ass btn btn-danger" >Delete this Assignment.</button>
  </div>
</div>

<button class="btn btn-success btn-small" href="#viewAssignment'.$dAssign['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-eye-open icon-white"></i> View</button></td><script>			
		$("#viewAssignment'.$dAssign['id'].'").on("hidden", function () {	
				location.reload();});		
		$("#viewAssignment'.$dAssign['id'].'").on("shown", function () {
			var rel1 = "'.$dAssign['id'].'";
			
	 $.post( "cont/changeLearnStatus1.php",
	         { cid: rel1},
			 function(info) {
			});});</script>';
if($type=="Teacher"  || $type=="Administrator"){
echo '<td><button class="btn btn-danger btn-small" href="#deleteAssign'.$dAssign['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-trash icon-white" data-toggle="tooltip" title="Delete this entry?"></i></button></td>';
				}	}else{
					echo'<button id="viewBtn" class="btn btn-disabled" data-toggle="tooltip" title="Register first to view the Assignment"><i class="icon-eye-open icon-white"></i> View</button></td><script>$("#viewBtn").tooltip();</script>';
					}
				echo '</tr>';
		ENDWHILE;
		echo "</table>
		<input type='hidden' id='ass_sub' rel5='".$cid."' rel='0' ></input>
		<script>
		$('.ass').click( function(){
		
	var rel1 = $(this).attr('rel'); ";echo '
	
 $(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />"); ';echo"
	 $.post( 'cont/deleteAssignment.php',
	         { cid: rel1},
			 function(info) {
				if( info == 'Deleted' ){
					location.reload();
					
				};
				$('#loader').remove();
		});
		
			
});
		$('#uploadbutton2').click( function(){
		$('#ass_sub').attr('rel',3);
		$('#ass_sub').val($(this).attr('rel'));
		});
		
		</script>
		<script type='text/javascript'>
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
		if($('#ass_sub').attr('rel')==3){
			var assid = $('#ass_sub').val();
			var cid = $('#ass_sub').attr('rel5');
			var studid = '".$_SESSION['uid']."';
			$.post( 'cont/addAssignSubmission.php',{ c : cid  , a : assid ,f : task.FileName , s : studid} , function(info){});
			$('#ass_sub').attr('rel',0);
		}
	}
		</script>
		<script type='text/javascript'>
	function doStart()
	{
		var uploadobj = document.getElementById('myuploader');
		if (uploadobj.getqueuecount() > 0)
		{
			uploadobj.startupload();
		}
		else
		{
			alert('Please browse files for upload');
		}
	}
	</script>";
		
		}
		else{
			echo '<strong >No assignments yet.</strong> ';
		}
	
	
?>