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
class lessons{
	function add_lesson($cid,$asTitle,$asDesc,$asEndDate){
		
		$qry = "INSERT into `uoc_learning` (cid,type,lname) VALUES('$cid','lesson','$asTitle') ";
		$rslt = connect($qry);
		$qry = "INSERT into `uoc_lessons` (cid,asTitle,asDesc,asEndDate) VALUES('$cid','$asTitle','$asDesc','$asEndDate') ";
		$rslt = connect($qry);
		
		return $rslt; 
		}
		function add_lessonuploads($cid,$assid,$filename){
		
		$qry = "INSERT into `uoc_lessonuploads` (assid,courseid,filename) VALUES('$assid','$cid','$filename') ";
		$rslt = connect($qry);
		
		return $rslt; 
		}
		function del_lesson($eid){
		
		$qry3 = "DELETE from `uoc_learned` WHERE `lid` = '$eid' ";
		$rslt3 = connect($qry3);
		$qry2 = "DELETE from `uoc_learning` WHERE `lid` = '$eid' ";
		$rslt2 = connect($qry2);
		$qry1 = "DELETE from `uoc_lessonuploads` WHERE `assid` = '$eid' ";
		$rslt1 = connect($qry1);
		$qry = "DELETE from `uoc_lessons` WHERE `id` = '$eid' ";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_lessonById($id){
		
		$qry = "SELECT * FROM `uoc_lessons` WHERE `id` = '$id'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_lessonByName($title){
		
		$qry = "SELECT * FROM `uoc_lessons` WHERE `asTitle` = '$title'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_lessonByAll(){
		$qry = "SELECT * FROM `uoc_lessons`";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_lessonByCourse($cid){
		
		$qry = "SELECT * FROM `uoc_lessons` WHERE `cid` = $cid ORDER by `asEndDate` desc";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_lessonuploadsBylessonId($assid,$cid){
		
		$qry = "SELECT * FROM `uoc_lessonuploads` WHERE `assid` = $assid AND `courseid` = $cid ORDER by `filename` asc";
		$rslt = connect($qry);
		return $rslt; 
		}
	}
?>