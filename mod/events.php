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
class events{
	function add_event($cid,$etitle,$edesc,$edate,$ecreator){
		
		$qry = "INSERT into `uoc_events` (cid,etitle,edesc,edate,ecreator) VALUES('$cid','$etitle','$edesc','$edate','$ecreator') ";
		$rslt = connect($qry);
		
		include "user.php";
		$user=new user();
		$r2 = $user->add_activity('Event','You created an event, entitled '.$etitle.' that will happen on '.$edate,$ecreator);
		return $rslt; 
		}
	function del_event($eid){
		
		$qry = "DELETE from `uoc_events` WHERE `id` = '$eid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_eventByCourse($cid){
		
		$qry = "SELECT * FROM `uoc_events` WHERE `cid` = $cid ORDER by `edate` desc";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>