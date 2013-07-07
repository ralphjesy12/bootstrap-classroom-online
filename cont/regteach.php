<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	
		require_once "../mod/user.php";
		$fname = mysql_real_escape_string($_POST["fname"]);
		$lname = mysql_real_escape_string($_POST["lname"]);
		$eml = mysql_real_escape_string($_POST["eml"]);
		$uname = mysql_real_escape_string($_POST["uname"]);
		$nick = mysql_real_escape_string($_POST["nick"]);
		$pass = mysql_real_escape_string($_POST["pass"]);
		$cpass = mysql_real_escape_string($_POST["cpass"]);
		$type = 2;
		$user = new user();
			if($pass === $cpass){
				if(mysql_num_rows($user->check_member($uname))===0){
					$represult = $user->add_member($fname,$lname,$eml,$uname,$pass,$type,$nick);
					if($represult){
						echo "<strong>Registration Success.</strong> New Teacher has been added.";
					}
					else{
						echo "<strong>Registration Failed.</strong> Try again.";
					}
				}else{
					echo "<strong>Account Exist.</strong> Try again.";
				}
			}else{
				echo "<strong>Password Mismatch</strong> Try again.";
			}
?>