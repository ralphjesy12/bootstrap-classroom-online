<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


		require_once "../mod/chat.php";
		
		$chat = new chat();
		$cid = $_POST['cid'];
		$msg = $_POST['msg'];
		$uname = $_POST['uname'];
		$rChat = $chat->add_msg($cid,$uname,$msg);
		if($rChat){
			echo 'Done';
		}else{
			echo 'Failed';
			}
?>