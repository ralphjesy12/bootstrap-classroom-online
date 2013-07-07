<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	session_start();
	if(isset($_SESSION["uid"])){
		$user = $_SESSION["uid"];
		$type = $_SESSION["type"];
		require_once 'cont/presence.php';
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
  <body  >
	
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
						<li><a href="<?php echo $courses;?>"><i class="icon-file"></i> Courses</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo $about;?>"><i class="icon-envelope"></i> About</a></li>
						<li class="divider-vertical"></li>
						<li class="active"><a href="<?php echo $contact;?>"><i class="icon-signal"></i> Contact</a></li>
						<li class="divider-vertical"></li>
					</ul>
					
					<ul class="nav pull-right">
						
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
						</ul>';}else{
						include "cont/getSigninup.php";
						
						}
						
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
<ul class="breadcrumb">
  <li><a href="index.php">Home</a> <span class="divider">></span></li>
  <li class="active">Contact Us</li>
</ul>
</div>
<div class="hero-unit well span12">
  <h1>Need to talk to us?
  <small>We're listening ...</small></h1>
  <p>One of the ways you can get in touch is through the form below. Your message will be dispatched to our consumer service teams and contacts worldwide. We will try to answer as soon as possible.</p>
</div>
<div class="span6">
<legend>Contact Us Anytime</legend>
  <form id="contact" action="cont/newFeedback.php">
      <div class="controls controls-row">
          <input id="name" name="n" type="text" class="span3" required="required" placeholder="Name"> 
          <input id="email" name="e" type="email" class="span3" required="required" placeholder="Email address">
      </div>
      <div class="controls">
          <textarea id="message" name="m" class="span6" required="required" placeholder="Your Message" rows="5"></textarea>
      </div>
      <div class="controls">
          <button id="contact-submit" class="btn btn-primary input-medium pull-right">Send</button>
      </div>
      <hr/><span class="ack alert alert-block alert-success hidden span5" ></span>
  </form>
</div>
</body>
<script> 
$("#contact-submit").click(function(){
if($("#name").val()=="" || $("#email").val()=="" || $("#message").val()==""){
				$(".ack").removeClass("hidden");
			   $(".ack").empty();
			   $(".ack").html('<button type="button" class="close" data-dismiss="alert">&times;</button><strong>Please fill up the form completely.</strong><br/> Then try again.');
}else{
		
 $(this).append("<img src='img/loading.gif' id='loader' />");
		$.post( $("#contact").attr("action"),
	         $("#contact :input").serializeArray(),
			 function(info) {
				$(".ack").removeClass("hidden");
			   $(".ack").empty();
			   $(".ack").html(info);
				clear();
				$("#loader").remove();
			 });
 
 }
});

$("#contact").submit( function() {
	   return false;	
});
function clear(){
 
	$("#contact :input").each( function() {
	      $(this).val("");
	});
	}


</script> 
<script type="text/javascript" src="js/register.js"></script>
<script type="text/javascript" src="js/signup.js"></script> 
<script type="text/javascript" src="js/logout.js"></script>
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