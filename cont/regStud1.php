<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	
		require_once "../mod/user.php";
		$user1 = new user();
		$s1 = mysql_real_escape_string($_POST["s1"]);
		$e1 = mysql_real_escape_string($_POST["e1"]);
		$s2 = mysql_real_escape_string($_POST["s2"]);
		$e2 = mysql_real_escape_string($_POST["e2"]);
	$cnt=0;
	$good=0;
if(ctype_digit($s1) && ctype_digit($e1) && ctype_digit($s2) && ctype_digit($e2)){
  if($e1<=$e2){
				WHILE($s1<=$s2):
					WHILE($e1<=$e2):
					if(strlen($e1)<7){
					if($e1<10)	$e1 = "000000".$e1;
					else if($e1<100)	$e1 = "00000".$e1;
					else if($e1<1000)	$e1 = "0000".$e1;
					else if($e1<10000)	$e1 = "000".$e1;
					else if($e1<100000)	$e1 = "00".$e1;
					else if($e1<1000000)	$e1 = "0".$e1;
					}
					$id=$s1."-".$e1;
					$cnt++;
				if(mysql_num_rows($user1->check_Id($id))===0){
					$represult = $user1->add_Id($id,"REGULAR");
					if($represult){
						$good++;
					}
					else{
						echo "<strong>Registration Failed.</strong> Try again.";
					}
					}else{
					echo "<strong>Student Id ".$id." Exist</strong><br/>";
					}
					$e1++;
					ENDWHILE;
					$s1++;
				ENDWHILE;	 
				if($good==0){
					echo "<strong>No ID has been registered.</strong>";
				}else if($cnt==$good){
					echo "<strong>All ID has been registered.</strong>";
				}else{
					echo "<strong>Not all ID has been registered.</strong>";
				}
				}else{
					echo "<strong>Start range must be less than End range.</strong> Try Something Else.";
				}
	  
  }else{
	echo 'ID Format does not match. Follow the pattern';
  }
		
		
?>