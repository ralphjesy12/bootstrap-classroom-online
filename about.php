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
						<li><a href="<?php echo $courses;?>"><i class="icon-file"></i> Courses</a></li>
						<li class="divider-vertical"></li>
						<li class="active"><a href="<?php echo $about;?>"><i class="icon-envelope"></i> About</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo $contact;?>"><i class="icon-signal"></i> Contact</a></li>
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
  <li class="active">About</li>
</ul>
</div>
 <!-- Main Area -->
<div id="main_area" class="container">
<!-- Slider -->
<div class="row">
<div class="span12" id="slider">
<!-- Top part of the slider -->
<div class="row">
	<div class="span7" id="carousel-bounding-box">
			<div id="myCarousel" class="carousel slide">
					<!-- Carousel items -->
					<div class="carousel-inner">
							<div class="active item" data-slide-number="0"><img src="img/1.jpg" /></div>
							<div class="item" data-slide-number="1"><img src="img/2.jpg" /></div>
							<div class="item" data-slide-number="2"><img src="img/3.jpg" /></div>
							<div class="item" data-slide-number="3"><img src="img/4.jpg" /></div>
							<div class="item" data-slide-number="4"><img src="img/5.jpg" /></div>
							<div class="item" data-slide-number="5"><img src="img/6.jpg" /></div>
					</div>
					<!-- Carousel nav -->
																				
				  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
	</div>
	<div class="span4" id="carousel-text"></div>

	<div style="display: none;" id="slide-content">
			<div id="slide-content-0">
					<h2>Easy Registration</h2>
					<p>An easy to find Navigation Bar with a login and sign up form in a popup gives ease to students in joining the Online Campus.</p>
					<p class="sub-text">Sign Up <a href="index.php">Now</a>!</p>
			</div>
			<div id="slide-content-1">
					<h2>Many more and counting ...</h2>
					<p>Find as many courses as you want. Some are restricted so be sure to secure a key from your instructor.</p>
					<p class="sub-text">Pick a course <a href="courses.php">Here</a>!</p>
			</div>
			<div id="slide-content-2">
					<h2>Fast Submission</h2>
					<p>Uploading answers to your assignments have never been this easy. You control when and what you submit. Just see to it that your on time</p>
					<p class="sub-text">Start learning <a href="index.php">Now</a>!</p>
			</div>
			<div id="slide-content-3">
					<h2>Interactive Quizzes</h2>
					<p>All you have to do is think , click , submit , then "VIOLA"!</p>
					<p class="sub-text">To see what it looks like. Enroll <a href="index.php">Now</a>!</p>
			</div>
			<div id="slide-content-4">
					<h2>Chat with everybody</h2>
					<p>Group Chat allows students in the same course interact with their classmates and professors. Live chatting was never bean this fast and fun.</p>
					<p class="sub-text">Experience it <a href="index.php">now</a>!</p>
			</div>
			<div id="slide-content-5">
					<h2>Let them now it privately.</h2>
					<p>If you wanna say something to someone in somehow private, this Personal Messaging feature will reach them in an instant.</p>
					<p class="sub-text">To try sending something, Sign up <a href="#">now</a>!</p>
			</div>
	</div>
</div>
</div>
</div> <!--/Slider-->

<div class="row hidden-phone" id="slider-thumbs">
<div class="span12">
<!-- Bottom switcher of slider -->
<ul class="thumbnails">
	<li class="span4">
			<a class="thumbnail" id="carousel-selector-0">
					<img src="img/thumb_1.jpg" />
			</a>
	</li>
	<li class="span4">
			<a class="thumbnail" id="carousel-selector-1">
					<img src="img/thumb_2.jpg" />
			</a>
	</li>
	<li class="span4">
			<a class="thumbnail" id="carousel-selector-2">
					<img src="img/thumb_3.jpg" />
			</a>
	</li>
	<li class="span4">
			<a class="thumbnail" id="carousel-selector-3">
					<img src="img/thumb_4.jpg" />
			</a>
	</li>
	<li class="span4">
			<a class="thumbnail" id="carousel-selector-4">
					<img src="img/thumb_5.jpg" />
			</a>
	</li>
	<li class="span4">
			<a class="thumbnail" id="carousel-selector-5">
					<img src="img/thumb_6.jpg" />
			</a>
	</li>
</ul>
</div>
</div>
</div>
<script>
jQuery(document).ready(function($) {

$('#myCarousel').carousel({
interval: 5000
});

$('#carousel-text').html($('#slide-content-0').html());

//Handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){
var id_selector = $(this).attr("id");
var id = id_selector.substr(id_selector.length -1);
var id = parseInt(id);
$('#myCarousel').carousel(id);
});


// When the carousel slides, auto update the text
$('#myCarousel').on('slid', function (e) {
var id = $('.item.active').data('slide-number');
$('#carousel-text').html($('#slide-content-'+id).html());
});


});
</script>
</body>
<script type="text/javascript" src="js/register.js"></script>
<script type="text/javascript" src="js/signup.js"></script> 
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