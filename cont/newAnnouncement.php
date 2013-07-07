<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/announcements.php";
		$atitle = mysql_real_escape_string($_POST["atitle"]);
		$adesc = mysql_real_escape_string($_POST["adesc"]);
		$acreator = mysql_real_escape_string($_SESSION['uid']);
		$cid1 = mysql_real_escape_string($_POST['cid1']);
		$announcement = new announcements();
			
				$ccreator = $_SESSION['uid'];
				if($atitle=="" || $adesc=="" ){
					echo 'Please fill out completely the form';
				}else{
				$represult = $announcement->add_announcement($cid1,$atitle,$adesc,$acreator);
					if($represult){
						echo "<strong>Creation Success.</strong> New Announcement Added.";
					}
					else{
						echo "<strong>Creation Failed.</strong> Try again.";
						
					}
		}
		
		
?>