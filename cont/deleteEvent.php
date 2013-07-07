<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/events.php";
		$eventid = $_POST["cid"];
		$event = new events();
		$represult = $event->del_event($eventid);
					if($represult){
						echo "Deleted";
					}
					else{
						echo "";
					}
?>