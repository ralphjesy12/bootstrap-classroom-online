<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

if($type=="Student"){
	echo '<ul class="nav nav-list">
	  <li class="active"><a href="#">Dashboard</a></li>
	  <li class="nav-header">Manage Courses</li>
	  <li><a id="enrollCourse" href="#enrollCourseModal" role="button" data-toggle="modal">Enroll on a New Course</a></li>
	  <li><a id="dropCourse" href="#dropCourseModal" role="button" data-toggle="modal">Drop on a Course</a></li>
	  <li class="nav-header">My Courses</li>
	  
	  ';
		include "enrollNewCourseModal.php"; 
		include "dropCourseModal.php"; 
	  require_once "mod/course.php";
		
		$course = new course();
		$represult = $course->find_coursebystudent($_SESSION['uid']);
		if(mysql_num_rows($represult)>0){
		WHILE($data = mysql_fetch_array($represult)):
			echo '<li><a href="courses.php?c='.$data['id'].'&"><strong>'.$data['ccode'].'</strong> '.$data['ctitle'].'</a></li>';
		ENDWHILE;
	  }else{
			echo '<li><a href="courses.php"><strong>No Courses Enrolled.</a></li>';
	  }
echo '</ul>';
	}
else{
echo '<ul class="nav nav-list">
	  <li class="active"><a href="#">Dashboard</a></li>
	  <li class="nav-header">Courses</li>
	  <li><a id="newCourseLink" href="#createCourseModal" role="button" data-toggle="modal">Create New Course</a></li>
	  <li><a id="editCourseLink" href="#editCourseModal" role="button" data-toggle="modal">Edit an existing Course</a></li>';
	  if($type=="Administrator"){
	 echo ' <li class="nav-header">Teachers</li>
	  <li><a id="newCourseLink" href="#createTeacherModal" role="button" data-toggle="modal">Register a Teacher</a></li>
	  <li><a id="editCourseLink" href="#removeTeacherModal" role="button" data-toggle="modal">Manage Teachers</a></li>
	  <li class="nav-header">Students</li>
	  <li><a id="newStudIdLink" href="#newStudIdModal" role="button" data-toggle="modal">Register a Student ID</a></li>
	  <li class="nav-header">All Courses</li>
';
	  }else{
	  echo '<li class="nav-header">My Managed Courses</li>';
	  }
	  require_once "mod/course.php";
		
		$course = new course();
		if($type=="Administrator") $represult = $course->find_courseall();
		else if($type=="Teacher") $represult = $course->find_coursebycreator($_SESSION['uid']);
		WHILE($data = mysql_fetch_array($represult)):
			echo '<li><a href="courses.php?c='.$data['id'].'"><strong>'.$data['ccode'].'</strong> '.$data['ctitle'].'</a></li>';
		ENDWHILE;
	  
echo '</ul>';
include "getNewCourseModal.php";
include "getEditCourseModal.php";
include "getNewTeacherModal.php";
include "newStudIdModal.php";
include "dropTeacherModal.php";
}
	
	
?>