<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	session_start();
	if(isset($_SESSION["uid"])){
		$user = $_SESSION["uid"];
		$type = $_SESSION["type"];
		if($type===1){ $type="Administrator";}
		else if($type===2){ $type="Teacher";}
		else{ $type="Student";}
		include "cont/getTool.php";
		}else{
		$type = "Guest";
		}
		include_once "conf/setup.php";
		
		$cid = $_SERVER["QUERY_STRING"];	
		
?>
<!DOCTYPE html>
<html>
  <head>
	<title>Error 404</title>
	
	<?php include_once "cont/allScript.php"?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/datepicker.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link rel="shortcut icon" href="<?php echo $icon_link;?>"> 
<style>
  .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
</style>
<title>Error 404</title>
<body>
  <div class="hero-unit center" style="height:100%;">
    <h1>Oops! <small><font face="Tahoma" color="red">Error 404</font></small></h1>
    <br />
    <p>It looks like you may have taken a wrong turn. 
Don't worry... it happens to the best of us.</p>
    <p><b>Press this neat little button that might help you get back on track</b></p>
    <a href="index.php" class="btn btn-large btn-success"><i class="icon-home icon-white"></i> Take Me Home</a>
  </div>
  <br />
	
</html>