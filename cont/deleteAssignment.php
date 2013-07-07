<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/assignments.php";
		$assignid = $_POST["cid"];
		$assign = new assignments();
		$represult = $assign->del_assign($assignid);
					if($represult){
						echo "Deleted";
					}
					else{
						echo "";
					}
?>