<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	session_start();
	if(isset($_SESSION["uid"])){
	
		$user = $_SESSION["uid"];
		
		require_once 'cont/presence.php';
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
    <title>Our Lady of Fatima University</title>
	
	<?php include_once "cont/allScript.php"?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/datepicker.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link rel="shortcut icon" href="<?php echo $icon_link;?>"> 
	<style type="text/css">  
		.socials {  
		padding: 10px;  
		}  
		body {	background:#ffffff url('img/bg.jpg') no-repeat fixed 100% 100%;
		}
	</style>

  </head>
  <body <?php if(isset($_GET['c']))	echo 'onload="setInterval(function(){updateChatBox()},1000)"';?> >
	
	<div class="navbar navbar-static-top" style="width:100%;margin-bottom:50px;position:fixed;top:0;">
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
						<li><a href="<?php echo $home;?>"><i class="icon-home"></i> Home</a></li>
						<li class="divider-vertical"></li>
						<li class="active"><a href="<?php echo $courses;?>"><i class="icon-file"></i> Courses</a></li>
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
						<?php  
					if($type!="Guest"){echo '<ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, '.$type.'<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="settings.php"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="contact.php"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="#" id="signoutbtn"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
						</ul>';}
						
						?>
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
<div style="margin-top:40px;">

<?php
if(!isset($_GET['c'])){
		include "cont/getCourseDash.php"; 
	}
	else{
		include "cont/courseDashboard.php";
		}
?>
</div>
</body>
  
<script type="text/javascript" src="js/logout.js"></script>
<script type="text/javascript" src="js/newCourse.js"></script>
 <?php include 'cont/social.php'; ?> 
<script type="text/javascript">
$(document).ready(function()
{
  //Handles menu drop down
  $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
        });
		
	$('#collapseOne').collapse('show');
 }); 
</script>
	
</html>