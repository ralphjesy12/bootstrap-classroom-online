<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/messages.php";
		$msgid = $_POST["cid"];
		$msg = new messages();
		$represult = $msg->del_feed($msgid);
					if($represult){
						echo "Deleted";
					}
					else{
						echo "";
					}
?>