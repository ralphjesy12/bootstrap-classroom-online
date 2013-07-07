<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */
session_start();
	if(isset($_SESSION["uid"]) && isset($_POST['d'])){
		require_once "mod/user.php";
		require_once "conf/config.php";
	}else{
		header( "Location: index.php" ) ;
	}
// Get the provided arg
$bid=$_POST['d'];
$f = new user();
$rf = $f->get_buByID($bid);
if(mysql_num_rows($rf)<1){
	header( "Location: index.php" ) ;
}else{
	$df=mysql_fetch_array($rf);
}
// Generate filename and set error variables
$filename = $df['fname'] . '.sql';
$sqlErrorText = '';
$sqlErrorCode = 0;
$sqlStmt      = '';

// Restore the backup
$con = mysql_connect($host,$user,$password);
if ($con !== false){
  // Load and explode the sql file
  mysql_select_db("$dbase");
  $f = fopen($filename,"r+");
  $sqlFile = fread($f,filesize($filename));
  $sqlArray = explode(';',$sqlFile);
          
  // Process the sql file by statements
  foreach ($sqlArray as $stmt) {
    if (strlen($stmt)>3){
         $result = mysql_query($stmt);
    }
  }
}
echo '<div class="cdalert alert alert-block">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <span>';
// Print message (error or success)
if ($sqlErrorCode == 0){
   echo("<h5>Database restored successfully!</h5>");
} else {
   echo("An error occurred while restoring backup!<br><br>\n");
   echo("Error code: $sqlErrorCode<br>\n");
   echo("Error text: $sqlErrorText<br>\n");
   echo("Statement:<br/> $sqlStmt<br>");
}
echo '</span></div>';
// Close the connection
mysql_close();

?>
