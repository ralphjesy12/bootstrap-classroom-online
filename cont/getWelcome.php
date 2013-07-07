<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  
	  require_once "mod/messages.php";
	  
		$message = new messages();
		$rmessage = $message->get_welcome();
		$fAcount = mysql_num_rows($rmessage);
		if($fAcount>0){
		WHILE($dmessage = mysql_fetch_array($rmessage)):
			echo '<strong>'.$dmessage['text'].'</strong>';
			
		ENDWHILE;
		
		if($type=="Administrator"){
		echo '<div id="editmessage" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
						<div class="modal-header">
							<h5 id="myModalLabel1">Edit Welcome Message</h5>
						</div>
						  <div class="modal-body">
							    <div class="control-group">
								  <label class="control-label" for="adesc">Message</label>
									<div class="controls">
										<textarea rows="3" id="wmsg" name="wmsg" class="input-xlarge" required="required" style="width:90%;">'.$dmessage['text'].'</textarea>
									</div>
								</div>
						  </div>
						  <div class="modal-footer">	
							<button class="btn btn-success btnsend1" data-dismiss="modal" aria-hidden="true">Save</button>
						  </div>
					</div>';
					
					}
		}else{
			echo "<strong>Welcome ".ucfirst($fname)." ".ucfirst($lname).". Have a good day!</strong>";
			if($type=="Administrator"){
		echo '<div id="editmessage" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
						<div class="modal-header">
							<h5 id="myModalLabel1">Edit Welcome Message</h5>
						</div>
						  <div class="modal-body">
							    
								<div class="control-group">
								  <label class="control-label" for="adesc">Message</label>
									<div class="controls">
										<form action="cont/saveMsg.php" method="POST">
						
										<textarea rows="3" id="wmsg" name="wmsg" class="input-xlarge" required="required" style="width:90%;">Welcome '.ucfirst($fname).' '.ucfirst($lname).'. Have a good day!</textarea>
										<button class="btn btn-success btnsend1" type="Submit">Save</button>
								</form>
									</div>
								</div>
						  </div>
						  <div class="modal-footer">	
							<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						  </div>
						  
					</div>';
					
					}
		}
?>