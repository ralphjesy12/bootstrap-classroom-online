<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/quizzes.php";
		$qqid = mysql_real_escape_string($_POST["qqid"]);
		$qqonum = mysql_real_escape_string($_POST["qqonum"]);
		$text = mysql_real_escape_string($_POST["text"]);
		$qid = mysql_real_escape_string($_POST["qid"]);
		$cid = mysql_real_escape_string($_POST["qc"]);
		$tof = 0;
		$quiz = new quizzes();
		$rQuiz = $quiz->add_quizzquestionsoptions($qid,$qqid,$text,$tof,$qqonum,$cid);
?>