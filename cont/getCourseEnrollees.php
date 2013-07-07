<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  
	  require_once "mod/course.php";
	  require_once "mod/user.php";
		
		$course = new course();
		$member = new user();
		$rCourse = $course->find_courseenrolleesById($cid);
		$nEnrollees = mysql_num_rows($rCourse);
		echo '<script>$("#navenrollees").html('.$nEnrollees.');</script>';
		if($nEnrollees>0){
		echo '<table class="table table-condensed" style="width:100%;margin-bottom:0"><tbody>';
		WHILE($dEnrollees = mysql_fetch_array($rCourse)):
			$rMember = $member->check_byId($dEnrollees['studid']);
			
			$dMember = mysql_fetch_array($rMember);
			$date = new DateTime($dMember['jdate']);
	$dDate = $date->format('F d, Y');
			echo '<tr>
					<td><span class="label label-success  text-center span2">'.ucfirst($dMember['fname']).' '.ucfirst($dMember['lname']).'</span></td>
					<td><span class="text-success span2">Username : <strong>'.$dMember['uname'].'</strong></span></td>
					<td width=300px><span class="text-success span3">Member since <strong>'.$dDate.'</strong></span></td>
					<td width=100px>'; 
					if($dMember['id']!=$_SESSION['uid']){
					echo '<a class="btn btn-success btn-small" href="#composemessage2" data-toggle="modal" data-backdrop="false" onclick="setRecipient('.$dMember['id'].');"><i class="icon-envelope icon-white"></i></a>';
					}
					
					echo'
					</td>
				</tr>';
			
			
		ENDWHILE;
		echo '</tbody></table>
		<script>
		function setRecipient(setId){
			$("select[name='; echo "'"; echo 'sender';echo "'"; echo ']").val(setId);
		}
		</script>
		
		<div id="composemessage2" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
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
		
<script type="text/javascript" src="js/newMsg.js"></script>
		';
	}
		else{
			echo '<strong >No Enrollees yet.</strong> ';
		}
	
	
?>