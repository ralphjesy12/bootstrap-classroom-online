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
class course{
	function add_course($ctitle,$ccode,$cvis,$passkey,$ccreator,$cdesc){
		
		$qry = "INSERT into `uoc_courses` (ctitle,ccode,cvis,passkey,ccreator,cdesc) VALUES('$ctitle','$ccode','$cvis','$passkey','$ccreator','$cdesc') ";
		$rslt = connect($qry);
		
		include "user.php";
		$user=new user();
		$r2 = $user->add_activity('Courses','You created the course '.$ctitle,$ccreator);
		return $rslt; 
		}
	function enroll_to_course($courseid,$studid){
		$qry = "INSERT into `uoc_enrollment` (courseid,studid) VALUES('$courseid','$studid') ";
		$rslt = connect($qry);
		
		include "user.php";
		$r1 = $this->find_coursebyid($courseid);
		$d1 = mysql_fetch_array($r1);
		$user=new user();
		$r2 = $user->add_activity('Courses','You enrolled to the course : '.$d1['ctitle'],$studid);
		return $rslt; 
		}
	function drop_to_course($courseid,$studid){
		$qry = "DELETE from `uoc_enrollment` WHERE courseid = $courseid AND studid = '$studid' ";
		$rslt = connect($qry);
		
		include "user.php";
		$r1 = $this->find_coursebyid($courseid);
		$d1 = mysql_fetch_array($r1);
		$user=new user();
		$r2 = $user->add_activity('Courses','You dropped the course : '.$d1['ctitle'],$studid);
		return $rslt; 
		
		}
	function find_coursebycreator($ccreator){
		$qry = "SELECT * from `uoc_courses` where `ccreator` = '$ccreator'";
		$rslt = connect($qry);
		return $rslt; 
		}
	function find_coursebyid($cid){
		$qry = "SELECT * from `uoc_courses` where `id` like '$cid'";
		$rslt = connect($qry);
		return $rslt;	
		}
	function find_courseall(){
		$qry = "SELECT * from `uoc_courses`";
		$rslt = connect($qry);
		return $rslt;	
		}
	function find_coursebyname($ctitle){
		$ctitle = ltrim($ctitle);
		$ctitle = rtrim($ctitle);
		$qry = "SELECT * from `uoc_courses` where `ctitle` like '$ctitle'";
		$rslt = connect($qry);
		return $rslt;	
		}
	function find_coursebystudent($studid){
		$qry = "SELECT * FROM `uoc_enrollment` INNER JOIN `uoc_courses` on `uoc_enrollment`.`courseid`=`uoc_courses`.`id` where `studid` like '$studid' ";
		$rslt = connect($qry);
		
		return $rslt;	
		}
	function find_courseenrolleesById($cid){
		$qry = "SELECT * FROM `uoc_enrollment` where `courseid` like '$cid' ";
		$rslt = connect($qry);
		
		return $rslt;	
		}
	function find_coursebyvisibility($vis){
		if($vis==0)		$qry = "SELECT * from `uoc_courses` where `cvis` = '0'";
		else if($vis==1)		$qry = "SELECT * from `uoc_courses` where `cvis` = '1' OR `cvis` = '0'";
		$rslt = connect($qry);
		return $rslt;	
		}
		
	function update_course($orig,$ctitle,$ccode,$cvis,$passkey,$cdesc,$ccreator){
			$qry = "UPDATE `uoc_courses` SET ctitle='".$ctitle."', ccode='".$ccode."', cvis='".$cvis."',cdesc='".$cdesc."', passkey='".$passkey."', ccreator='".$ccreator."' WHERE ctitle = '".$orig."' ";
			$rslt = connect($qry);
			return $rslt;
	}
	}
?>