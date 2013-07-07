<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

require_once "../mod/messages.php";
$m = new messages();
$text = $_POST['wmsg'];
$r = $m->get_welcome();
if(mysql_num_rows($r)>0){
$r = $m->update_welcome($text);
}else{
$r = $m->add_welcome($text);
}
header('Location:../profile.php');

?>