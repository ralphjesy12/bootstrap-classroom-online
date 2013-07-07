<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	
		require_once "../mod/user.php";
		$uname = mysql_real_escape_string($_POST["uname"]);
		$pass = mysql_real_escape_string($_POST["pass"]);
		$user = new user();
				if(mysql_num_rows($user->check_login($uname,$pass))===0){
					echo "<strong>Username or Password Incorrect.</strong> Try again.";
				}else{
					session_start();
					$data = mysql_fetch_array($user->check_member($uname));
					$_SESSION["uid"] = $data['id'];
					$_SESSION["name"] = $data['uname'];
					$user->add_activity("Login","You logged in as : ".$data['uname'],$data['id']);
					if($data['utype']==="1"){
						$_SESSION["type"] = 1;
						echo "<strong>Welcome Administrator.</strong> <br/>Please wait...";
					}else if($data['utype']==="2"){
						$_SESSION["type"] = 2;
						echo "<strong>Welcome Teacher.</strong> <br/>Please wait...";
					}else{
						$_SESSION["type"] = 0;
						echo "<strong>Welcome Student.</strong> <br/>Please wait...";
					}
					
				}
?>