<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  
	  require_once "mod/messages.php";
	  require_once "mod/user.php";
		
		$message = new messages();
		$users1 = new user();
		$rmessage = $message->find_messageByID($_SESSION['uid']);
		$fmessage = $message->find_messageByFeeds();
		$rAcount = mysql_num_rows($rmessage);
		$fAcount = mysql_num_rows($fmessage);
		
		echo '<script>$(".nummsg").html('.$rAcount.');</script>';
		if($rAcount>0){
		echo '<table class="table table-condensed" style="width:100%;margin-top:20px;"><caption><strong>Personal Messages</strong></caption>';
		WHILE($dmessage = mysql_fetch_array($rmessage)):
			$raCreator = $users1->check_byId($dmessage['sender']);
			$dCreator = mysql_fetch_array($raCreator);
			$atitle = substr($dmessage['text'], 0, 22);
			$aCreator = substr(ucfirst($dCreator['fname']).' '.ucfirst($dCreator['lname']), 0, 22);
			$date = new DateTime($dmessage['ts']);
			$odate = date_format( $date,"H:i:s a");
			$odate2 = date_format( $date,"F j, Y");
			echo '<tr>
					<td><span class="label label-success  text-center " data-toggle="tooltip" title="'.$odate2.'">'.$odate.'</span></td>
					<td width=200px><span class="text-success "><strong>'.$atitle.'</strong></span></td>
					<td width=200px><span class="text-success ">From <strong>'.$aCreator.'</strong></span></td>
					<td width=80px>
					
					
					

<button class="btn btn-success btn-small pull-right" href="#viewmessage'.$dmessage['id'].'" data-toggle="modal" data-backdrop="true" ><i class="icon-eye-open icon-white"></i> View</button></td>
<td width=80px><button class="btn btn-danger btn-small" href="#deletemessage'.$dmessage['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-trash icon-white" data-toggle="tooltip" title="Delete this entry?"></i></button></td></tr>

<div id="viewmessage'.$dmessage['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
						<div class="modal-header">
							<h5 id="myModalLabel1">Sender : '.$aCreator.'...</h5>
						</div>
						  <div class="modal-body"><h4><span class="badge badge-success" data-toggle="tooltip" title="'.$odate2.'"><i class="icon-calendar icon-white"></i>'.$odate.'</span></h4><br/>'.$dmessage["text"].'
						  <br/><hr><span class="text-success">Sender : <strong data-toggle="tooltip" title="Member : '.$dCreator['uname'].'">'.ucfirst($dCreator['fname']).' '.ucfirst($dCreator['lname']).' </strong></span>
						  </div>
						  <div class="modal-footer">
							<a class="btn btn-success btn-small" href="#composemessage2" data-toggle="modal" data-backdrop="true" onclick="setRecipient('.$dmessage['sender'].');"><i class="icon-share-alt icon-white"></i>Reply</a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						  </div>
					</div>


<div id="deletemessage'.$dmessage['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">Delete this message?</h3>
  </div>
  <div class="modal-body">
	<h4><span class="badge badge-success" data-toggle="tooltip" title="'.$odate2.'"><i class="icon-calendar icon-white"></i>'.$odate.'</span></h4><br/>'.$dmessage["text"].'
	
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No, keep this message.</button>
	<button  rel="'.$dmessage['id'].'" class="ann btn btn-danger" >Delete this message.</button>
  </div>
</div>
';
		ENDWHILE;
		echo "</table>
		
		
		<script>
		$('.ann').click( function(){
		
	var rel1 = $(this).attr('rel');
	
 $(this).append('<img src="; echo '"img/loading.gif"'; echo 'id="loader"';echo " />');
	 $.post( 'cont/deletemessage.php',
	         { cid: rel1},
			 function(info) {
				if( info == 'Deleted' ){
					location.reload();
					
				};
				$('#loader').remove();
		});
		
			
});
		
		</script>";
		echo '<div id="composemessage2" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
						<div class="modal-header">
							<h5 id="myModalLabel1">Compose Message</h5>
						</div>
						  <div class="modal-body">
							    
								<div class="control-group">
								  <label class="control-label"  for="atitle">Recipient</label>
								  <div class="controls" >
									<select name="sender" required="required">';
										require_once "mod/user.php";
										$users1 = new user();
										$recipients = $users1->check_all();
										if(mysql_num_rows($recipients)>0){
										WHILE($opt = mysql_fetch_array($recipients)):
											if($opt['id']!=$_SESSION['uid']){
											echo "<option value='".$opt["id"]."'>".ucfirst($opt['fname'])." ".ucfirst($opt['lname'])."</option>";
											}
										ENDWHILE;
										}else{
											echo "<option>Nothing</option>";
										}
										
										echo'
									</select>
								  </div>
								</div>
							 
								<div class="control-group">
								  <label class="control-label" for="adesc">Message</label>
									<div class="controls">
										<textarea rows="3" rel="'.$_SESSION['uid'].'" id="msg" name="msg" class="input-xlarge" required="required" style="width:90%;"></textarea>
									</div>
								</div>
						  </div>
						  <div class="modal-footer">	
							<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
							<button class="btn btn-success btnsend" data-dismiss="modal" aria-hidden="true">Send</button>
						  </div>
					</div>
					<script>
		function setRecipient(setId){
			$("select[name='; echo "'"; echo 'sender';echo "'"; echo ']").val(setId);
		}
		</script>';
		}
		else{
			echo '<strong >No Messages yet.</strong>';
		}
		if($type=="Administrator"){
		if($fAcount>0){
		echo '<table class="table table-condensed" style="width:100%;margin-top:20px;"><caption><strong>Feedback Messages from Guests</strong></caption>';
		WHILE($dfmessage = mysql_fetch_array($fmessage)):
		
		
		$atitle = substr($dfmessage['message'], 0, 22);
		$aCreator = substr($dfmessage['name'], 0, 22);
			$date = new DateTime($dfmessage['ts']);
			$odate = date_format( $date,"H:i:s a");
			$odate2 = date_format( $date,"F j, Y");
			echo '<tr>
					<td><span class="label label-success  text-center " data-toggle="tooltip" title="'.$odate2.'">'.$odate.'</span></td>
					<td width=200px><span class="text-success "><strong>'.$atitle.'</strong></span></td>
					<td width=200px><span class="text-success ">Guest : <strong>'.$aCreator.'</strong></span></td>
					<td width=80px>
					<button class="btn btn-success btn-small pull-right" href="#viewfeed'.$dfmessage['id'].'" data-toggle="modal" data-backdrop="true" ><i class="icon-eye-open icon-white"></i> View</button></td>
<td width=80px><button class="btn btn-danger btn-small" href="#deletefeed'.$dfmessage['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-trash icon-white" data-toggle="tooltip" title="Delete this entry?"></i></button></td></tr>

<div id="viewfeed'.$dfmessage['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
						<div class="modal-header">
							<h5 id="myModalLabel1">Sender : '.$aCreator.'...</h5>
						</div>
						  <div class="modal-body"><h4><span class="badge badge-success" data-toggle="tooltip" title="'.$odate2.'"><i class="icon-calendar icon-white"></i>'.$odate.'</span></h4><br/>'.$dfmessage["message"].'
						  <br/><hr><span class="text-success">Sender : <strong data-toggle="tooltip" title="Email : '.$dfmessage['email'].'">'.$aCreator.' </strong></span>
						  </div>
						  <div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						  </div>
					</div>


<div id="deletefeed'.$dfmessage['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">Delete this message?</h3>
  </div>
  <div class="modal-body">
	<h4><span class="badge badge-success" data-toggle="tooltip" title="'.$odate2.'"><i class="icon-calendar icon-white"></i>'.$odate.'</span></h4><br/>'.$dfmessage["message"].'
	
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No, keep this message.</button>
	<button  rel="'.$dfmessage['id'].'" class="feed btn btn-danger" >Delete this message.</button>
  </div>
</div>
';
		ENDWHILE;
		echo "</table><script>$('.feed').click( function(){
		
	var rel1 = $(this).attr('rel');
	
 $(this).append('<img src="; echo '"img/loading.gif"'; echo 'id="loader"';echo " />');
	 $.post( 'cont/deletefeed.php',
	         { cid: rel1},
			 function(info) {
				if( info == 'Deleted' ){
					location.reload();
					
				};
				$('#loader').remove();
		});
		
			
});</script>";
		
		}else{
			echo '<hr/><strong >No Guest Feedbacks yet.</strong> ';
		}
	}
?>