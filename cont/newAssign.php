<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/assignments.php";
		require_once "../mod/learning.php";
		require_once "../mod/course.php";
		$asTitle = mysql_real_escape_string($_POST["atitle"]);
		$asDesc = mysql_real_escape_string($_POST["adesc"]);
		$asEndDate = mysql_real_escape_string($_POST["adate"]);
		$cid = mysql_real_escape_string($_POST['cid1']);
		$assignments = new assignments();
		$course = new course();
		$learn = new learning();
		$match = $assignments->find_assignByName($asTitle);	
		if(mysql_num_rows($match)==0){
				if($asTitle=="" || $asDesc=="" ){
					echo 'Please fill out completely the form';
				}else{
				$represult = $assignments->add_assignment($cid,$asTitle,$asDesc,$asEndDate);
					if($represult){
					echo "<strong>Creation Success.</strong> New Assignment Added.";
					$rep1 = $course->find_courseenrolleesById($cid);
					$rep2 = $learn->find_alllearns();
					$rep2cnt = mysql_num_rows($rep2);
						if(mysql_num_rows($rep1)>0){
							WHILE($dRep1=mysql_fetch_array($rep1)):
									$sid = $dRep1['studid'];
									$qry = "INSERT into `uoc_learned` (lid,studid,status) VALUES('$rep2cnt','$sid','ON QUEUE') ";
									$rslt = connect($qry);
							ENDWHILE;
						}
					}
					else{
						echo "<strong>Creation Failed.</strong> Try again.";
						
					}
		}
		}else{
			echo "<strong>Assigment Title exist.</strong> Try another one.";
		}
		
?>