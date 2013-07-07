<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/quizzes.php";
		$quizid = $_POST["cid"];
		$quiz = new quizzes();
		$represult = $quiz->del_quiz($quizid);
					if($represult){
						echo "Deleted";
					}
					else{
						echo "";
					}
?>