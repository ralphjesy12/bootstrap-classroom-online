<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/course.php";
		
		if( 
		!isset($_POST["ctitle1"]) || 
		!isset($_POST["ccode1"]) || 
		!isset($_POST["cvis1"]) || 
		!isset($_POST["opt2"]) 
		
		
		){
			echo "<strong>Please fill up the form completely.</strong> Try again.";
		}else{
		
		$ctitle = mysql_real_escape_string($_POST["ctitle1"]);
		$ccode = mysql_real_escape_string($_POST["ccode1"]);
		$ccreator = mysql_real_escape_string($_POST["ccreator1"]);
		$cvis = mysql_real_escape_string($_POST["cvis1"]);
		$opt1 = mysql_real_escape_string($_POST["opt2"]);
		$passkey = mysql_real_escape_string($_POST["passkey1"]);
		$cdesc = mysql_real_escape_string($_POST["cdesc1"]);
		$course = new course();
		
		if($opt1==0 || $passkey==""){
			$passkey = "NONE";
		}
				$orig = $_POST["ctitles"];
				$represult = $course->update_course($orig,$ctitle,$ccode,$cvis,$passkey,$cdesc,$ccreator);
					if($represult){
						echo "<strong>Update Success.</strong> Course Saved.";
					}
					else{
						echo "<strong>Update Failed.</strong> Try again.";
					}
		
		}
		
?>