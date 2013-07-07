<?php
	function connect($sql){
	include 'config.php';
	$db = mysql_connect($host,$user,$password) or die(mysql_error());
	mysql_select_db($dbase,$db) or die(mysql_error());
	$result = mysql_query($sql,$db);
	return $result;
	}
?>