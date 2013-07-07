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
class learning{
	function find_alllearns(){
		$qry = "SELECT * FROM `uoc_learning`";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_alllearnedById($lid,$sid){
		$qry = "SELECT * FROM `uoc_learned` WHERE `lid` = '$lid' AND `studid` = '$sid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_alllearnsById($cid){
		$qry = "SELECT * FROM `uoc_learning` WHERE `cid` = '$cid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_alllearnById($id){
		$qry = "SELECT * FROM `uoc_learning` WHERE `id` = '$id'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_alllearnsByTitle($title){
		$qry = "SELECT * FROM `uoc_learning` WHERE `lname` = '$title'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function update_learnStats($sid,$lid,$stat){
		$qry = "UPDATE `uoc_learned` SET `status` = '$stat' WHERE `lid` = $lid AND `studid` = $sid ";
		$rslt = connect($qry);
		$r1 = $this->find_alllearnById($lid);
		$d1 = mysql_fetch_array($r1);
		include "user.php";
		$user=new user();
		$r3 = $user->get_activitybydesc($sid,'New '.$d1['type'].':'.$d1['lname'].' has been viewed');
		if(mysql_num_rows($r3)<1){
		$r2 = $user->add_activity('Learning','New '.$d1['type'].':'.$d1['lname'].' has been viewed',$sid);
		}
		return $rslt; 
		}
	}
?>