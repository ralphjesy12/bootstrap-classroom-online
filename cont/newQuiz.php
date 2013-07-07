<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/quizzes.php";
		$qTitle = mysql_real_escape_string($_POST["qt"]);
		$qDate = mysql_real_escape_string($_POST["qd"]);
		$cid = mysql_real_escape_string($_POST["qc"]);
		$qid = mysql_real_escape_string($_POST["qid"]);
		$quiz = new quizzes();
		$rQuiz = $quiz->add_quizz($qTitle,$qDate,$cid,$qid);
?>