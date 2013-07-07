<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/course.php";
		$ctitle = mysql_real_escape_string($_POST["ctitle"]);
		$ccode = mysql_real_escape_string($_POST["ccode"]);
		$cvis = mysql_real_escape_string($_POST["cvis"]);
		$opt1 = mysql_real_escape_string($_POST["opt1"]);
		$passkey = mysql_real_escape_string($_POST["passkey"]);
		$cdesc = mysql_real_escape_string($_POST["cdesc"]);
		$course = new course();
		
		if($ctitle == "" || $ccode == "" || $cvis == "" ){
			echo "<strong>Please fill up the form completely.</strong> Try again.";
		}else{
		
		if($opt1==0 || $passkey==""){
			$passkey = "NONE";
		}
				$ccreator = $_SESSION['uid'];
				$represult = $course->add_course($ctitle,$ccode,$cvis,$passkey,$ccreator,$cdesc);
					if($represult){
						echo "<strong>Creation Success.</strong> Course Added.";
					}
					else{
						echo "<strong>Creation Failed.</strong> Try again.";
					}
		
		}
		
?>