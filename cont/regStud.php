<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	
		require_once "../mod/user.php";
		$user1 = new user();
		$s1 = mysql_real_escape_string($_POST["s11"]);
		$e1 = mysql_real_escape_string($_POST["e1"]);
		$id = $s1."-".$e1;
				if(mysql_num_rows($user1->check_Id($id))===0){
					$represult = $user1->add_Id($id,"REGULAR");
					if($represult){
						echo "<strong>Student ID has been Added.</strong>";
					}
					else{
						echo "<strong>Registration Failed.</strong><br/> Try again.";
					}
				}else{
					echo "<strong>Student Id Exist.</strong><br/> Try Something Else.";
				}
?>