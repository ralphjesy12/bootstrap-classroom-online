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
		include_once "conf/setup.php";
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
  <li class="active"><?php echo ucfirst($fname)." ".ucfirst($lname);?></li>
</ul>
<div class="container">

	<legend>Dashboard
	<?php
		include_once "cont/getOnlineUsers.php";
	?>
	</legend>
	<div class="row">
	<div id="" class="span3 well" style="max-width: 340px; padding: 8px 0;">
	<?php include "cont/getDash.php"; ?>
	</div>
<div class="span8">  
     <div class="accordion" id="accordion2"> 
		<style>
			.accordion-group{background-color:#fff;}
		</style>
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">  
                  <strong>Welcome Message</strong>  
					<?php if($type=="Administrator"){
					echo '<button class="btn btn-success btn-mini pull-right span1" href="#editmessage" data-toggle="modal" >Edit</button>	';} ?>					
                </a>  
              </div>  
              <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">  
                <div class="accordion-inner">  
                  <?php include 'cont/getWelcome.php';?>
                </div>  
              </div>  
            </div>  
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">  
                 <strong>My Messages</strong><span class="nummsg badge badge-success" style="margin-left:10px" ></span>
				<button class="btn btn-success btn-mini pull-right span1" href="#composemessage" data-toggle="modal" >Compose</button>				 
                </a>  
              </div>  
              <div id="collapseTwo" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  <?php include 'cont/getMessages.php';?>
                </div>  
              </div>  
            </div>   
            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree"> <strong >Latest Activities</strong></a>  
              </div>  
              <div id="collapseThree" class="accordion-body collapse">  
                <div class="accordion-inner">
					<?php if(!isset($_GET['v']))
					echo '<a class="btn btn-success btn-mini pull-rigt" href="profile.php?&v=a&">View all</a>		';
						else	
					echo '<a class="btn btn-success btn-mini pull-rigt" href="profile.php">Show less</a>		';
						?>			
                  <?php include 'cont/getActivities.php';?>
                </div>  
              </div>  
            </div>  
			
			<div id="composemessage" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
						<div class="modal-header">
							<h5 id="myModalLabel1">Compose Message</h5>
						</div>
						  <div class="modal-body">
							    
								<div class="control-group">
								  <label class="control-label"  for="atitle">Recipient</label>
								  <div class="controls" >
									<select name="sender" required="required">
										<?php 
										require_once "mod/user.php";
										$users1 = new user();
										$recipients = $users1->check_all();
										if(mysql_num_rows($recipients)>0){
										WHILE($opt = mysql_fetch_array($recipients)):
											if($opt['id']!=$_SESSION['uid']){
											echo "<option value='".$opt["id"]."'>".ucfirst($opt['fname'])." ".ucfirst($opt['lname'])."</option>";
											}
										ENDWHILE;
										}else{
											echo "<option>Nothing</option>";
										}
										?>
									</select>
								  </div>
								</div>
							 
								<div class="control-group">
								  <label class="control-label" for="adesc">Message</label>
									<div class="controls">
										<textarea rows="3" rel="<?php echo $_SESSION['uid']; ?>" id="msg" name="msg" class="input-xlarge" required="required" style="width:90%;"></textarea>
									</div>
								</div>
						  </div>
						  <div class="modal-footer">	
							<button class="btn btn-success btnsend" data-dismiss="modal" aria-hidden="true">Send</button>
						  </div>
					</div>
					
				
            </div>  
          </div>  
    </div>  
</div>

</body>
  
<script type="text/javascript" src="js/logout.js"></script>
<script type="text/javascript" src="js/newCourse.js"></script>
<script type="text/javascript" src="js/newMsg.js"></script>
<?php include 'cont/social.php'; ?> 
<script type="text/javascript">
$(document).ready(function()
{
  //Handles menu drop down
  $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
        });
		
	$('#collapseOne').collapse('show');
	$('#collapseTwo').collapse('show');
	$('#collapseThree').collapse('show');
 }); 
</script>

   

	
</html>