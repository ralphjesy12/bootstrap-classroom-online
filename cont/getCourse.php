<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


		require_once "../mod/course.php";
		
		$course = new course();
		$title =$_POST['ctitle'];
		$represult = $course->find_coursebyname($title);
		echo json_encode(mysql_fetch_array($represult));
		

?>