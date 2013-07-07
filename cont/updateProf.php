<?php

/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */
	
		require_once "../mod/user.php";
		$regid = mysql_real_escape_string($_POST["regid"]);
		$fname = mysql_real_escape_string($_POST["fname"]);
		$lname = mysql_real_escape_string($_POST["lname"]);
		$uname = mysql_real_escape_string($_POST["uname"]);
		$eml = mysql_real_escape_string($_POST["eml"]);
		$pass = mysql_real_escape_string($_POST["pass"]);
		$user = new user();
				if($user->update_member($regid,$fname,$lname,$uname,$eml,$pass)){
					header( "Location: ../settings.php" ) ;
				}else{
					header( "Location: ../index.php" ) ;
				}
?>