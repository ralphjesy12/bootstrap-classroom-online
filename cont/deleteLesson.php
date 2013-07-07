<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/lessons.php";
		$lessonid = $_POST["cid"];
		$lessons = new lessons();
		$represult = $lessons->del_lesson($lessonid);
					if($represult){
						echo "Deleted";
					}
					else{
						echo "";
					}
?>