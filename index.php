<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	session_start();
	if(isset($_SESSION["uid"])){
		header( "Location: profile.php" ) ;
		$user = $_SESSION['uid'];
		require_once 'cont/presence.php';
	}else{
		include_once "conf/setup.php";
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
				<a class="brand" href="#" name="top">Our Lady of Fatima University</a>
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
					<?php include "cont/getSigninup.php";?>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</div>
		<!--/.navbar-inner -->
	</div>
	<!--/.navbar -->
	
	

<div id="fb-root"></div>

<div class="container">	
<br/>
<h1 class="text-success">University Online Campus</h1><br/>
<div class="row">
        <div class="span4">
		<div class="well">
        <legend>Login to Campus</legend>
        <form id="myForm2" method="POST" action="cont/signin.php" accept-charset="UTF-8">
			 <label>Student or Faculty ID</label>
            <input class="span3" placeholder="e.g. 20130001-0001" required="required" type="text" name="uname">
			<label>Password</label>
            <input class="span3" placeholder="Password" required="required" type="password" name="pass"> 
            <div class="alert alert-error hidden">
                <a class="close" data-dismiss="alert" href="#">x</a>Incorrect Username or Password!
            </div>
            <button id="loginbtn" class="btn-success btn" >Login</button>  
   			
			
        </form>
		<div id="ack2" class="alert hidden"></div>			
      </div>
      </div>
    </div>	
		<div class="span4">
          <h5><i class="icon icon-globe"></i> AUTONOMOUS STATUS</h5>
          <p>Our Lady of Fatima University was granted Autonomous Status last March 2009 by the Commission on Higher Education (CHED) for its accomplishments, adherence to quality assurance, and commitment to public responsibility and accountability as a higher education institution.  

All private higher education institutions (PHEI) strive for Autonomous Status but only very few attain such status and added to the roster.</p>
        </div>
 
        <div class="span4">
          <h5><i class="icon-ok"></i> INSTITUTIONAL QUALITY ASSURANCE THROUGH MONITORING AND EVALUATION (IQuAME)</h5>
          <p>Our Lady of Fatima University applied to Commission on Higher Education (CHED) for the commission's national program called IQuAME (Institutional Quality Assurance through Monitoring and Evaluation) and was granted A(t) Status that states that OLFU is recognized as a Mature Teaching Institution'.</p>
        </div>
		
</div>
</div>
</body>
  
<script type="text/javascript" src="js/register.js"></script>
<script type="text/javascript" src="js/signup.js"></script>
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