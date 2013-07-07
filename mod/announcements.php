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
class announcements{
	function add_announcement($cid,$atitle,$adesc,$acreator){
		
		$qry = "INSERT into `uoc_announcements` (cid,atitle,adesc,acreator) VALUES('$cid','$atitle','$adesc','$acreator') ";
		$rslt = connect($qry);
		
		include "user.php";
		$user=new user();
		$r2 = $user->add_activity('Announcements','You created an announcement entitled : '.$atitle,$acreator);
		return $rslt; 
		}
		function del_announce($eid){
		
		$qry = "DELETE from `uoc_announcements` WHERE `id` = '$eid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_announcementByCourse($cid){
		
		$qry = "SELECT * FROM `uoc_announcements` WHERE `cid` = $cid ORDER by `cdate` desc";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>