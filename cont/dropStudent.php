<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/course.php";
		$courseid = $_POST["cid"];
		$course = new course();
		$ccreator = $_SESSION['uid'];
		$represult = $course->drop_to_course($courseid,$ccreator);
					if($represult){
						echo "Dropped";
					}
					else{
						echo "";
					}
?>