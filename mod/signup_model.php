<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	function add_member($fname,$lname,$eml,$pass){
		include "../config/database.php";
		$qry = "INSERT into members(fname,lname,eml,pass) VALUES('$fname','$lname','$eml','$pass') ";
		$rslt=connect($qry);
		return $rslt; 
		}
?>