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
class user{
	function add_member($fname,$lname,$eml,$regid,$pass,$type,$uname){
		$qry = "INSERT into `uoc_members` (fname,lname,eml,uname,pass,utype,regid) VALUES('$fname','$lname','$eml','$uname','$pass','$type','$regid') ";
		$rslt = connect($qry);
		$r1 = $this->check_member($regid);
		$d1 = mysql_fetch_array($r1);
		$r2 = $this->add_activity('Registration','Account has been created.',$d1['id']);
		return $rslt; 
		}
	function update_member($regid,$fname,$lname,$uname,$eml,$pass){
		
		$qry = "UPDATE `uoc_members` SET `jdate`=`jdate`,`fname`='$fname',`lname`='$lname',`uname`='$uname',`eml`='$eml',`pass`='$pass' WHERE `regid` = '$regid'";
		$rslt = connect($qry);
		$r1 = $this->check_member($regid);
		$d1 = mysql_fetch_array($r1);
		$r2 = $this->add_activity('Profile','You update your profile.',$d1['id']);
		return $rslt; 
		}
	function check_all(){
		$qry = "SELECT * from `uoc_members` ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function check_member($uname){
		$qry = "SELECT * from `uoc_members` where `regid` = '$uname' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function check_memberID($uname){
		$qry = "SELECT * from `uoc_studentid` where `studid` = '$uname' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function check_login($uname,$pass){
		$qry = "SELECT * from `uoc_members` where `regid` = '$uname' and `pass` = '$pass' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function check_type($type){
		$qry = "SELECT * from `uoc_members` where `utype` = '$type'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function check_byId($id){
		$qry = "SELECT * from `uoc_members` where `id` = '$id'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function add_Id($id,$stats){
		$qry = "INSERT into `uoc_studentid`(`studid`,`status`) VALUES ('$id','$stats')";
		$rslt = connect($qry);
		return $rslt; 
		}
	function add_bu($fname,$desc){
		$qry = "INSERT into `uoc_bu`(`fname`,`desc`) VALUES ('$fname','$desc')";
		$rslt = connect($qry);
		return $rslt; 
		echo $qry; 
		}
	function add_activity($type,$desc,$uid){
		$qry = "INSERT into `uoc_activity`(`type`,`desc`,`uid`) VALUES ('$type','$desc','$uid')";
		$rslt = connect($qry);
		return $rslt; 
		}
	function get_activity($uid){
		$qry = "SELECT * from `uoc_activity` WHERE `uid`='$uid' ORDER BY `ts` desc LIMIT 5";
		$rslt = connect($qry);
		return $rslt; 
		}
	function get_activitybydesc($uid,$desc){
		$qry = "SELECT * from `uoc_activity` WHERE `uid`='$uid' AND `desc`='$desc'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function get_allactivity($uid){
		$qry = "SELECT * from `uoc_activity` WHERE `uid`='$uid' ORDER BY `ts` desc";
		$rslt = connect($qry);
		return $rslt; 
		}
	function check_Id($id){
		$qry = "SELECT * from `uoc_studentid` where `studid` = '$id'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function get_bu(){
		$qry = "SELECT * from `uoc_bu` ORDER BY `ts` DESC";
		$rslt = connect($qry);
		return $rslt; 
		}
	function get_buByID($bid){
		$qry = "SELECT * from `uoc_bu` WHERE `id` = '$bid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function remove_byId($id){
		$qry = "DELETE from `uoc_members` where `id` = '$id'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function update_lastactivity($id){
		$newtime = date("Y-m-d H:i:s");
		$qry = "UPDATE `uoc_members` SET `lastactivity` = '$newtime' where `id` = '$id'";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>