<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/learning.php";
		require_once "../mod/lessons.php";
		$lid = $_POST["cid"];
		$sid = $_SESSION['uid'];
		$learn = new learning();
		$lesson = new lessons();
		$rLesson = $lesson->find_lessonById($lid);
		if(mysql_num_rows($rLesson)>0){
			$dLesson = mysql_fetch_array($rLesson);
			$rLearn = $learn->find_alllearnsByTitle($dLesson['asTitle']);
			$dLearn = mysql_fetch_array($rLearn);
			$lid1 = $dLearn['id'];
			$rep = $learn->update_learnStats($sid,$lid1,"VIEWED");
					
					}
?>