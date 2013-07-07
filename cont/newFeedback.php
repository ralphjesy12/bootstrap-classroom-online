<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

		session_start();
		require_once "../mod/messages.php";
		$n = mysql_real_escape_string($_POST["n"]);
		$e = mysql_real_escape_string($_POST["e"]);
		$m = mysql_real_escape_string($_POST["m"]);
		$msg = new messages();
		$represult = $msg->add_feed($n,$e,$m);
		if($represult){
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button><strong>Your Message has been sent.</strong><br/> We will keep in touch with you as soon as possible.';
		}else{
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wront.</strong><br/> Refresh the page and try again.';
		}
?>