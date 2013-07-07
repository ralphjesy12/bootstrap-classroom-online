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
class chat{
	function add_msg($cid,$uname,$msg){
		
		$qry = "INSERT into `uoc_gchat` (cid,uname,msg) VALUES('$cid','$uname','$msg') ";
		$rslt = connect($qry);
		
		return $rslt; 
		}
		
	function get_msg($cid){
		$qry = "SELECT * FROM `uoc_gchat` WHERE `cid`  = '$cid' ORDER BY `time` ASC ";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>