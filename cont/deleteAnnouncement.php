<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/announcements.php";
		$announceid = $_POST["cid"];
		$announce = new announcements();
		$represult = $announce->del_announce($announceid);
					if($represult){
						echo "Deleted";
					}
					else{
						echo "";
					}
?>