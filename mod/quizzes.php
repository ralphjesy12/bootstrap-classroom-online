<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

if(file_exists('conf/database.php')){
	include_once 'conf/database.php';
}else{
include_once "../conf/database.php";
}
class quizzes{
	function add_quizz($qTitle,$qDate,$cid,$qid){
		$qry = "INSERT into `uoc_quizzes` (`qTitle`,`qDate`,`cid`,`qid`) VALUES('$qTitle','$qDate','$cid','$qid') ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function del_quiz($qid){
		$qry = "DELETE from `uoc_quizzes` WHERE `id` = '$qid' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function add_quizresults($score,$qid,$cid,$uid){
		$qry = "INSERT into `uoc_quizresults` (`studid`,`cid`,`qid`,`score`) VALUES('$uid','$cid','$qid','$score') ";
		$rslt = connect($qry);
		include 'user.php';
		$user=new user();
		$d1 = mysql_fetch_array($this->find_quizByCourseAndId($cid,$qid));
		$r2 = $user->add_activity('Quiz','You answered a quiz entitled '.$d1['qTitle'] .' with a score of '.$score,$uid);
		return $rslt; 
		}
	function add_quizzquestions($qid,$text,$qnum,$cid){
		$qry = "INSERT into `uoc_quizquestions` (`qid`,`text`,`qnum`,`cid`) VALUES('$qid','$text','$qnum','$cid') ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function add_quizzquestionsoptions($qid,$qqid,$text,$tof,$qqonum,$cid){
		$qry = "INSERT into `uoc_qqoptions` (`qid`,`qqid`,`text`,`tof`,`qqonum`,`cid`) VALUES('$qid','$qqid','$text','$tof','$qqonum','$cid') ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function set_quizzquestionsoptions($qid,$qqid,$qqonum,$tof,$cid){
		$qry = "UPDATE `uoc_qqoptions` SET `tof`='$tof' WHERE `qid` = '$qid' AND `qqid` = '$qqid' AND `cid` = '$cid' AND `qqonum` = '$qqonum' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_quizByCourse($cid){
		$qry = "SELECT * from `uoc_quizzes` WHERE `cid` = '$cid' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_quizByCourseAndId($cid,$qid){
		$qry = "SELECT * from `uoc_quizzes` WHERE `cid` = '$cid' AND `qid` = '$qid' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_quizquestionByCourseAndId($cid,$qid){
		$qry = "SELECT * from `uoc_quizquestions` WHERE `cid` = '$cid' AND `qid` = '$qid' ORDER BY `qnum` ASC";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_quizquestionoptionsByCourseAndId($cid,$qid,$qqid){
		$qry = "SELECT * from `uoc_qqoptions` WHERE `cid` = '$cid' AND `qid` = '$qid' AND `qqid` = '$qqid' ORDER BY `qqonum` ASC";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_quizresultsByCourseAndId($cid,$qid,$sid){
		$qry = "SELECT * from `uoc_quizresults` WHERE `cid` = '$cid' AND `qid` = '$qid' AND `studid` = '$sid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_quizresultsByCourse($cid,$qid){
		$qry = "SELECT * from `uoc_quizresults` WHERE `cid` = '$cid' AND `qid` = '$qid' ORDER BY `score` DESC";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>