<?php	
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */
	
			session_start();
			require_once "../mod/lessons.php";
		
			$newfilename  = $_GET['f'];
			$courseid  = $_GET['c'];
			$assid  = $_GET['a'];
			if($courseid=="" || $assid==""){echo "bad";}else{
			$myfile = new lessons();
			$cnt = $myfile->find_lessonByAll();
			$cnt1 = mysql_num_rows($cnt);
			$upfile = $myfile->add_lessonuploads($courseid,$cnt1,$newfilename);
			echo 'good';
			}
?>