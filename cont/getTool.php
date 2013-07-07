<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

include_once "./mod/user.php";
$id = $_SESSION['uid'];
$user = new user();
				
					$data = mysql_fetch_array($user->check_byId($id));
					$fname = $data['fname'];
					$lname = $data['lname'];
					$eml = $data['eml'];
				
?>