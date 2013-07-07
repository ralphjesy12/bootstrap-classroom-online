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
class messages{
	function add_message($s,$r,$t){
		
		$qry = "INSERT into `uoc_messages` (sender,recipient,text) VALUES('$s','$r','$t') ";
		$rslt = connect($qry);
		
		return $rslt; 
		}
	function add_feed($n,$e,$m){
		
		$qry = "INSERT into `uoc_feedbacks` (name,email,message) VALUES('$n','$e','$m') ";
		$rslt = connect($qry);
		return $rslt; 
		}
		function del_msg($mid){
		
		$qry = "DELETE from `uoc_messages` WHERE `id` = '$mid'";
		$rslt = connect($qry);
		return $rslt; 
		}
		function del_feed($mid){
		
		$qry = "DELETE from `uoc_feedbacks` WHERE `id` = '$mid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_messageByID($recipient){
		$qry = "SELECT * FROM `uoc_messages` WHERE `recipient` = $recipient ORDER by `ts` desc";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_messageByFeeds(){
		$qry = "SELECT * FROM `uoc_feedbacks` ORDER by `ts` desc";
		$rslt = connect($qry);
		return $rslt; 
		}
	function add_welcome($text){
		$qry = "INSERT into `uoc_welcome` (text) VALUES('$text') ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function get_welcome(){
		$qry = "SELECT * FROM `uoc_welcome` ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function update_welcome($text){
		$qry = "UPDATE `uoc_welcome` SET `text`='$text' WHERE `id`=1";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>