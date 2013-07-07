<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

$crs = $cid;
$sid = $_SESSION['uid'];
require_once "mod/learning.php";
require_once "mod/lessons.php";
require_once "mod/assignments.php";
$learning = new learning();
$lessons = new lessons();
$assign = new assignments();
$rLearn = $learning->find_alllearnsById($crs);
$cnt = 0;
if(mysql_num_rows($rLearn)>0){
	echo '<table>';
	WHILE($dLearn = mysql_fetch_array($rLearn)):
		$lid = $dLearn['id'];
		$rLearned = $learning->find_alllearnedById($lid,$sid);
		
		if(mysql_num_rows($rLearned)>0){
		$dLearned = mysql_fetch_array($rLearned);
		$cnt++;
		if($dLearn['type']=="lesson"){
			$title = $dLearn['lname'];
			$rLesson = $lessons->find_lessonByName($title);
			$dLesson = mysql_fetch_array($rLesson);
			echo '<tr>
					<td><span class="badge badge-success ">'.$cnt.'</span></td>
					<td><span class="label label-success span2">'.$dLearn['lname'].'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$dLearned['status'].'</strong></span></td>
					<td class="span3">
					<button class="btn btn-success btn-small" href="#viewlesson'.$dLesson['id'].'" data-toggle="modal" data-backdrop="false"><i class="icon-eye-open icon-white"></i> View</button></td>
			</tr>'; 
		}else if($dLearn['type']=="assignment"){
			
			$title = $dLearn['lname'];
			$rAssign = $assign->find_assignByName($title);
			$dAssign = mysql_fetch_array($rAssign);
			echo '<tr>
					<td><span class="badge badge-success ">'.$cnt.'</span></td>
					<td><span class="label label-success span2">'.$dLearn['lname'].'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$dLearned['status'].'</strong></span></td>
					<td class="span3">
					<button class="btn btn-success btn-small" href="#viewAssignment'.$dAssign['id'].'" data-toggle="modal" data-backdrop="false"><i class="icon-eye-open icon-white"></i> View</button></td>
			</tr>'; 
		}
		

	}
	ENDWHILE;
	echo '</table>';
	}else{
	echo '<strong>Course have no Lessons or Assignments Yet.</strong>';
	
	}

?>