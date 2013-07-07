<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

session_start();
if(isset($_SESSION['uid'])){
	session_destroy();
	header('Location:../index.php');
	}
else
	header('Location:../index.php');
?>