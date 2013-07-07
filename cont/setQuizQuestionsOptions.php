<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/quizzes.php";
		$qqid = mysql_real_escape_string($_POST["qqid"]);
		$qqonum = mysql_real_escape_string($_POST["qqonum"]);
		$qid = mysql_real_escape_string($_POST["qid"]);
		$tof = mysql_real_escape_string($_POST["optval"]);
		$cid = mysql_real_escape_string($_POST["qc"]);
		$quiz = new quizzes();
		$rQuiz = $quiz->set_quizzquestionsoptions($qid,$qqid,$qqonum,$tof,$cid);
?>