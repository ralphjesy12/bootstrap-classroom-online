<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/quizzes.php";
		$score = mysql_real_escape_string($_POST["cid"]);
		$qid = $_SESSION['q'];
		$cid = $_SESSION['c'];
		$uid = $_SESSION['uid'];
		$quiz = new quizzes();
		$rQuiz = $quiz->add_quizresults($score,$qid,$cid,$uid);
		if($rQuiz){
			echo 'Submitted';
		}else{
			echo 'Failed to Submit Grade';
		}	
?>