<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/messages.php";
		$s = mysql_real_escape_string($_POST["s"]);
		$t = mysql_real_escape_string($_POST["m"]);
		$r = mysql_real_escape_string($_POST["r"]);
		$msg = new messages();
		$represult = $msg->add_message($s,$r,$t);
		
?>