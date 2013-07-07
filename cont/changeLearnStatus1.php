<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/learning.php";
		require_once "../mod/assignments.php";
		$lid = $_POST["cid"];
		$sid = $_SESSION['uid'];
		$learn = new learning();
		$assignments = new assignments();
		$rAssign = $assignments->find_assignById($lid);
		if(mysql_num_rows($rAssign)>0){
			$dAssign = mysql_fetch_array($rAssign);
			$rLearn = $learn->find_alllearnsByTitle($dAssign['asTitle']);
			$dLearn = mysql_fetch_array($rLearn);
			$lid1 = $dLearn['id'];
			$rep = $learn->update_learnStats($sid,$lid1,"VIEWED");	
					}
?>