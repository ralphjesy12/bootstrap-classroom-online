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
class assignments{
	function add_assignment($cid,$asTitle,$asDesc,$asEndDate){
		$qry = "INSERT into `uoc_learning` (cid,type,lname) VALUES('$cid','assignment','$asTitle') ";
		$rslt = connect($qry);
		$qry = "INSERT into `uoc_assignments` (cid,asTitle,asDesc,asEndDate) VALUES('$cid','$asTitle','$asDesc','$asEndDate') ";
		$rslt = connect($qry);
		
		return $rslt; 
		}
	function add_assignmentsub($cid,$assid,$studid,$filename){
		$qry = "INSERT into `uoc_assignsubmissions` (cid,assid,studid,filename) VALUES('$cid','$assid','$studid','$filename') ";
		$rslt = connect($qry);
		echo $qry; 
		return $rslt; 
		}
		
		
		function add_assignuploads($cid,$assid,$filename){
		
		$qry = "INSERT into `uoc_assignuploads` (assid,courseid,filename) VALUES('$assid','$cid','$filename') ";
		$rslt = connect($qry);
		
		return $rslt; 
		}
		
	function find_assignById($id){
		
		$qry = "SELECT * FROM `uoc_assignments` WHERE `id` = '$id'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_assignByName($title){
		
		$qry = "SELECT * FROM `uoc_assignments` WHERE `asTitle` = '$title'";
		$rslt = connect($qry);
		return $rslt; 
		}
		function del_assign($eid){
		
		$qry3 = "DELETE from `uoc_learned` WHERE `lid` = '$eid' ";
		$rslt3 = connect($qry3);
		$qry2 = "DELETE from `uoc_learning` WHERE `id` = '$eid' ";
		$rslt2 = connect($qry2);
		$qry1 = "DELETE from `uoc_assignuploads` WHERE `assid` = '$eid' ";
		$rslt1 = connect($qry1);
		$qry = "DELETE from `uoc_assignments` WHERE `id` = '$eid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_assignmentByAll(){
		
		$qry = "SELECT * FROM `uoc_assignments` ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_assignmentByCourse($cid){
		
		$qry = "SELECT * FROM `uoc_assignments` WHERE `cid` = $cid ORDER by `asCdate` desc";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_assignuploadsByAssignId($assid,$cid){
		
		$qry = "SELECT * FROM `uoc_assignuploads` WHERE `assid` = $assid AND `courseid` = $cid ORDER by `filename` asc";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_assignsubmissions($cid,$assid,$studid){
		
		$qry = "SELECT * FROM `uoc_assignsubmissions` WHERE `assid` = '$assid' AND `cid` = '$cid' AND `studid` = '$studid'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_assignsubmissionsbyassid($cid,$assid){
		$qry = "SELECT * FROM `uoc_assignsubmissions` WHERE `assid` = '$assid' AND `cid` = '$cid' ORDER BY `ts` DESC";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>