<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	
		require_once "../mod/user.php";
		$fname = mysql_real_escape_string($_POST["fname"]);
		$lname = mysql_real_escape_string($_POST["lname"]);
		$eml = mysql_real_escape_string($_POST["eml"]);
		$nick = mysql_real_escape_string($_POST["nick"]);
		$uname = mysql_real_escape_string($_POST["uname"]);
		$pass = mysql_real_escape_string($_POST["pass"]);
		$cpass = mysql_real_escape_string($_POST["cpass"]);
		$type = 0;
		$user = new user();
			if($pass === $cpass){
				if(mysql_num_rows($user->check_memberID($uname))===1){
				if(mysql_num_rows($user->check_member($uname))===0){
					$represult = $user->add_member($fname,$lname,$eml,$uname,$pass,$type,$nick);
					if($represult){
						echo "<strong>Registration Success.</strong> You can now Login.";
					}
					else{
						echo "<strong>Registration Failed.</strong> Try again.";
					}
				}else{
					echo "<strong>Student ID Exist.</strong> Try again.";
				}
				
				}else{
					echo "<strong>Student ID not Registered</strong> Try again.";
				}
			}else{
				echo "<strong>Password Mismatch</strong> Try again.";
			}
?>