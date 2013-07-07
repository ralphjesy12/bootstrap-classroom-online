<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/events.php";
		$etitle = mysql_real_escape_string($_POST["etitle"]);
		$edesc = mysql_real_escape_string($_POST["edesc"]);
		$edate = mysql_real_escape_string($_POST["edate"]);
		$ecreator = mysql_real_escape_string($_SESSION['uid']);
		$cid = mysql_real_escape_string($_POST['cid']);
		$event = new events();
			
				$ccreator = $_SESSION['uid'];
				if($etitle=="" || $edesc=="" || $edate==""){
					echo 'Please fill out completely the form';
				}else{
				$represult = $event->add_event($cid,$etitle,$edesc,$edate,$ecreator);
					if($represult){
						echo "<strong>Creation Success.</strong> Event Added.";
					}
					else{
						echo "<strong>Creation Failed.</strong> Try again.";
						
					}
		}
		
		
?>