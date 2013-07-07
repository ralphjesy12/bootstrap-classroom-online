<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/user.php";
		$id = $_POST["cid"];
		$user = new user();
		$represult = $user->remove_byId($id);
					if($represult){
						echo "Dropped";
					}
					else{
						echo "";
					}
?>