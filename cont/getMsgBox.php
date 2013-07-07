<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

session_start();
		require_once "../mod/chat.php";
		
		$chat = new chat();
		$cid = $_POST['cid'];
		$rChat = $chat->get_msg($cid);
		$sender = $_SESSION['name'];
		if(isset($_POST['last'])) $last = $_POST['last'];
		else $last = 0;
		$counter = 0;
		if(mysql_num_rows($rChat)>0){
		WHILE($dChat = mysql_fetch_array($rChat)):
		
		$lastid = $dChat['id'];
		if($last < $dChat['id']){
		$counter ++;
		$date = new DateTime($dChat['time']);
		$odate = date_format( $date,"H:i:s a");
		$odate2 = date_format( $date,"F j, Y");
		if($sender === $dChat['uname']){
			echo '<span class="lastid1 alert alert-success span10 pull-right text-right" rel="'.$dChat['id'].'"><strong>'.$dChat['msg'].'</strong> - '.$dChat['uname'].'<div class="label label-success pull-left" data-toggle="tooltip" title="'.$odate2.'">'.$odate.'</div></span>'; }
		else{
			echo '<span class="lastid1 alert alert-success span10 pull-left text-left"  rel="'.$dChat['id'].'"><strong>'.$dChat['msg'].'</strong> - '.$dChat['uname'].'<div class="label label-success pull-right" data-toggle="tooltip" title="'.$odate2.'">'.$odate.'</div></span>';
			}
			
				}
		ENDWHILE;
			if($counter==0)	
				echo "none";
			
	}else{
		echo "empty";
	}
?>