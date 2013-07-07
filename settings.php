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
		include_once "conf/setup.php";
		require_once 'cont/presence.php';
	}else{
		header( "Location: index.php" ) ;
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Our Lady of Fatima University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link rel="shortcut icon" href="<?php echo $icon_link;?>"> 
	<style type="text/css">  
		.socials {  
		padding: 10px;  
		}  
		  
		body {	background:#ffffff url('img/bg.jpg') no-repeat fixed 100% 100%;
		}
	</style>
	<?php include_once "cont/allScript.php"?>
  </head>
  <body>
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php" name="top">Our Lady of Fatima University</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="active"><a href="<?php echo $home;?>"><i class="icon-home"></i> Home</a></li>
						<li class="divider-vertical"></li>
						<li ><a href="<?php echo $courses;?>"><i class="icon-file"></i> Courses</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo $about;?>"><i class="icon-envelope"></i> About</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo $contact;?>"><i class="icon-signal"></i> Contact</a></li>
						<li class="divider-vertical"></li>
					</ul>
					<ul class="nav pull-right">
                

						
						<li class="divider-vertical"></li>
						<li class="dropdown">  
							<a href="#"  
								  class="dropdown-toggle"  
								  data-toggle="dropdown">  
								  <i class="icon-star"></i>
								  <b class="caret"></b>  
							</a>  
							<ul class="dropdown-menu">  
								<li class="socials"><!-- Place this tag where you want the +1 button to render -->  
									<g:plusone annotation="inline" width="150"></g:plusone>  
								</li>  
								<li class="socials"><div class="fb-like" data-send="false" data-width="150" data-show-faces="true"></div></li>  
								<li class="socials"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>  
								</li>  
							</ul>  
						</li>  
						</ul>
						<ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $type;?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="settings.php"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="contact.php"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="#" id="signoutbtn"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
						</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</div>
		<!--/.navbar-inner -->
	</div>
	<!--/.navbar -->
<div id="fb-root"></div>
<ul class="breadcrumb">
  <li><a href="index.php">Home</a> <span class="divider">></span></li>
  <li ><a href="index.php"><?php echo ucfirst($fname)." ".ucfirst($lname);?></a> <span class="divider">></span></li>
  <li class="active">Settings</li>
</ul>
<div class="container">
<legend>Profile Settings</legend>
<?php
require_once("mod/user.php");
$prof = new user();
$rprof = $prof->check_byId($_SESSION['uid']);
$dprof = mysql_fetch_array($rprof);
if($dprof['utype']=="1")	$utype="Administrator";
if($dprof['utype']=="2")	$utype="Professor";
if($dprof['utype']=="0")	$utype="Student";
$date = new DateTime($dprof['jdate']);
$odate = date_format( $date,"H:i:s a");
$odate2 = date_format( $date,"F j, Y");
echo '
<div class="well">
	<div class="row">
	<form action="cont/updateProf.php" method="POST" accept-charset="UTF-8">
        <div class="span3">
	
		<label>First name : </label><input  class="span3" type="text" name="fname" required="required" value="'.$dprof['fname'].'">
		<label>Last name : </label><input  class="span3" type="text" name="lname" required="required" value="'.$dprof['lname'].'">
		<label>User name : </label><input  class="span3" type="text" name="uname" required="required" value="'.$dprof['uname'].'">
	
</div>
<div class="span3">
		<label>Registered ID : </label><input  class="span3" type="text" name="regid" readonly="readonly" value="'.$dprof['regid'].'">
		<label>Email Address : </label><input  class="span3" type="email" name="eml" required="required" value="'.$dprof['eml'].'">
		<label>Password : </label>
		<div class="input-append  span3 pull-left" style="margin-left:5px;">
					<input type="password" name="pass" required="required" readonly="readonly" value="'.$dprof['pass'].'"><span class="add-on" data-toggle="tooltip" title="Click Here to Change" ><i class="iconizer icon-lock " href="#changePass" data-toggle="modal" ></i></span>
			</div>
		
</div>
<div class="span3">
		<label>Member Type : </label><input  class="span3" type="text" name="memtype" readonly="readonly" value="'.$utype.'">
		<label>Join Date : </label><input  class="span3" type="text" name="jdate"  readonly="readonly" value="'.$odate2.' at exactly '.$odate.'" >
		<label>&nbsp;</label><input type="submit" class="btn btn-success span3" value="Update Profile"> 
</div>
</form>
</div>
</div>
<div id="changePass" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Change Password</h3>
  </div>
  <div class="modal-body">
  <label>Old Password : </label><input  class="span3" type="password" name="opass" required="required" >
  <label>New Password : </label><input  class="span3" type="password" name="npass" required="required" >
  <label>Confirm Password : </label><input  class="span3" type="password" name="cpass" required="required" >
  
		 <div class="cpalert alert alert-block hidden">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <span></span>
		</div>
  </div>
  <div class="modal-footer">
    <button id="changePassword" class="btn btn-success" >Change</button>
  </div>
</div>
';
?>
<?php

if($type=="Administrator"){
echo '	<legend>Database Settings</legend>
	<div class="well">
	<a class="btn btn-success" href="#backup" data-toggle="modal">Create a Database Restore Point</a>
	<a class="btn btn-danger" href="#restore" data-toggle="modal">Restore Database from an earlier time</a>
	</div>
	<div id="backup" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Create a Restore Point</h3>
  </div>
  <div class="modal-body">
  <form>
	<div class="span3">
	<label>Restore Point Description : </label>
	<textarea class="span5" type="text" name="desc" >Created : '.date("F j, Y H:i:s a").'</textarea	>
	</div>
  </form>
		 <br/><br/><br/><br/><div class="cralert alert alert-block hidden">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <span></span>
		</div>
  </div>
  <div class="modal-footer">
    <button data-dismiss="modal" class="btnclose btn" >Go Back</button>
    <button id="back" class="btnclose btn btn-success" >Create</button>
  </div>
</div>
	<div id="restore" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
   <h3 id="myModalLabel">Restore Database</h3>
  </div>
  <div id="rbody" class="modal-body">
  <div class="alert alert-error alert-block">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <h4>Warning!</h4>
		  <span>Restoring Database from an earlier time will ERASE the current state of the system and will bring back the data saved before the selected restore date.</span>
		</div>';
		$ba = new user();
$rba = $ba->get_bu();
$cba = mysql_num_rows($rba);

		if($cba>0){
		echo '<h4>Available Restore Points</h4>';
		
		WHILE($dba = mysql_fetch_array($rba)):
					
			$d = new DateTime($dba['ts']);
			$od = date_format( $d,"h:ia");
			$od2 = date_format( $d,"l F j, Y");
			if($dba['desc']==""){
				$de = "No Descriptions Available";
			}else{
				$de = $dba['desc'];
			}
			echo '<div class="alert alert-info alert-block"><button class="res btn btn-danger pull-right" rel="'.$dba['id'].'" ><i class="icon-time icon-white"></i>&nbsp;Restore</button><span class="label label-info"><i class="icon-calendar icon-white"></i>&nbsp;'.$od2.' at '.$od.'</span><br/><br/>'.$de.'</div>';
		ENDWHILE;
		}else{
		echo '<h3>No Restore Points Available</h3>';
		}
		echo '
		 <br/><br/><div class="cdalert alert alert-block hidden">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <span></span>
		</div>
  </div>
  <div class="modal-footer">
    <button class="btnclose btn " data-dismiss="modal">Close</button>
  </div>
</div>';
}
?>
</div>
</body>
<script>
$("#changePassword").click(function(){
var o1 = $("input[name='pass']").val();
var o2 = $("input[name='opass']").val();
var n = $("input[name='npass']").val();
var c = $("input[name='cpass']").val();

if(o2=="" || n=="" || c==""){
$(".cpalert").removeClass("hidden");
$(".cpalert > span").empty();
$(".cpalert > span").html("<strong>Oops!</strong> You left something , fill it up completely.");
}else{
	if(o1==o2){
		if(n==c){
			$("input[name='pass']").val(c);
			$('#changePass').modal('hide')
		}else{
		$(".cpalert").removeClass("hidden");
		$(".cpalert > span").empty();
		$(".cpalert > span").html("<strong>New Passwords aren't the same.</strong> Take a look again.");
		}
	}else{
	$(".cpalert").removeClass("hidden");
	$(".cpalert > span").empty();
	$(".cpalert > span").html("<strong>Is this really you?</strong> Old Password incorrect, Try again.");
	}

}

});
$("#back").click(function(){
var c = $("textarea[name='desc']").val();

if(c==""){
$(".cralert").removeClass("hidden");
$(".cralert > span").empty();
$(".cralert > span").html("<strong>Wait!</strong> We need to put some description to easily identify this restore point in the near future.");
}else{
	
 $(this).append("<img src='img/loading.gif' id='loader' />");
	$.post("backup.php",{d : c},function(info){
		$(".cralert").removeClass("hidden");
		$(".cralert > span").empty();
		$('#loader').remove();
		$(".cralert > span").html("<strong>Success!</strong> Restore Point Created");
	});
}

});
$(".btnclose").click(function(){
location.reload();
});
$(".res").click(function(){
var c = $(this).attr("rel");
$(this).append("<img src='img/loading2.gif' id='loader' />");
	$.post("restore.php",{d : c},function(info){
		$('#loader').remove();
		$('#rbody').empty();
		$('#rbody').html(info);
	});

});
</script>  
<script type="text/javascript" src="js/logout.js"></script>
<?php include 'cont/social.php'; ?> 
<script type="text/javascript">
</html>