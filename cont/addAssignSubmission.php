<?php	
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */
	
			session_start();
			require_once "../mod/assignments.php";
		
			$filename  = $_POST['f'];
			$cid  = $_POST['c'];
			$assid  = $_POST['a'];
			$studid  = $_POST['s'];
			$myfile = new assignments();
			$upfile = $myfile->add_assignmentsub($cid,$assid,$studid,$studid."_".$filename);
			
?>