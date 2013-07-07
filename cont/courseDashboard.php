<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


		require_once "mod/course.php";
		require_once "mod/user.php";
		$cid = $_GET['c'];
		$course = new course();
		$users = new user();
		$represult = $course->find_coursebyid($cid);
		$data = mysql_fetch_array($represult);
		$represult2 = $users->check_byId($data['ccreator']);
		$data2 = mysql_fetch_array($represult2);
		$title =  $data['ctitle'];
		$date = new DateTime($data['cdate']);
		$odate = date_format( $date,"F d, Y");
		$manager = mb_convert_case(ucfirst($data2['fname']).' '.ucfirst($data2['lname']), MB_CASE_TITLE, "UTF-8");
		$ismanager=0;
		
if(!isset($_SESSION['name'])){  
   $_SESSION['name'] = "Guest";
}  
		if(isset($_SESSION['uid']) && ($_SESSION['uid']===$data['ccreator'])) $ismanager=1;
		if($type=="Administrator") $ismanager=1;
		echo '
  
<div data-spy="scroll" style="overflow-y:scroll;width:100%;height:94%;position:fixed;top:40px;z-index:-1;">	
<div class="container" >
	
	<div class="row" >
	
		<div id="" class="span3 well affix pull-left" style="max-width: 340px; margin-top:40px;padding: 8px 0;">
		<ul class="nav navbar1 nav-list">
			<li class="nav-header">'.$data['ctitle'].'</li>
			<li class="active" ><a href="#overview"><i class="icon-home "></i>Overview</a></li>
			<li ><a id="desc1" href="#desc"><i class="icon-align-justify "></i>Description</a></li>';
			if($type=="Student"){echo '<li ><a id="desc1" href="#prog"><i class="icon-align-justify "></i>Progress</a></li>';}
			echo '
			<li ><a href="#event"><i class="icon-signal "></i>Latest Events';
			if($ismanager==1){
				echo '<button class="btn btn-success btn-mini pull-right" href="#addEventModal" role="button" data-toggle="modal" ><i class="icon-plus-sign icon-white"></i>Add</button><span class="badge badge-success pull-right" id="navevents" style="margin-right:5px;"></span>
				
				</a></li>
			<li ><a href="#announ"><i class="icon-bullhorn "></i>Announcements<button class="btn btn-success btn-mini pull-right" href="#addAnnouncementModal" role="button" data-toggle="modal" ><i class="icon-plus-sign icon-white"></i>Add</button><span class="badge badge-success pull-right" id="navannounce" style="margin-right:5px;"></span></a></li>';
			}
			else{
			echo '<span class="badge badge-success pull-right" id="navevents"></span></a></li><li><a href="#announ"><i class="icon-bullhorn "></i>Announcements<span class="badge badge-success pull-right" id="navannounce"></span></a></li>';
			}
			echo'
			<li class="nav-header">Learning Path</li>
			<li ><a href="#exer"><i class="icon-list "></i>Lessons';
			if($ismanager==1){
				echo '<button class="btn btn-success btn-mini pull-right" href="#addLessonModal" role="button" data-toggle="modal" ><i class="icon-plus-sign icon-white"></i>Add</button><span class="badge badge-success pull-right" id="navless" style="margin-right:5px;">0</span></a></li>';
			}
			else{
			echo '<span class="badge badge-success pull-right" id="navless"></span></a></li>';
			}
			echo'<li ><a href="#assign"><i class="icon-book "></i>Assignments';
			if($ismanager==1){
				echo '<button class="btn btn-success btn-mini pull-right" href="#addAssignModal" role="button" data-toggle="modal" ><i class="icon-plus-sign icon-white"></i>Add</button><span class="badge badge-success pull-right" id="navassign" style="margin-right:5px;"></span></a></li>';
			}
			else{
			echo '<span class="badge badge-success pull-right" id="navassign"></span></a></li>';
			}
			echo'<li ><a href="#quiz"><i class="icon-book "></i>Quizzes';
			if($ismanager==1){
				echo '<button class="btn btn-success btn-mini pull-right" href="#addQuizModal" role="button" data-toggle="modal" ><i class="icon-plus-sign icon-white"></i>Add</button><span class="badge badge-success pull-right" id="navquiz" style="margin-right:5px;">0</span></a></li>';
			}
			else{
			echo '<span class="badge badge-success pull-right" id="navquiz">0</span></a></li>';
			}
			if($data['cdesc']==="") $data['cdesc']="Enrollees are Welcome.";
			
			echo'
			
			<li ><a href="#docs"><i class="icon-download-alt "></i>Document Materials<span class="badge badge-success pull-right" id="navdocs"></span></a></li>
			<li class="nav-header">Students</li>
			<li ><a href="#enrollees"><i class="icon-user "></i>Enrollees<span class="badge badge-success pull-right" id="navenrollees"></span></a></li>
			<li ><a href="#gchat"><i class="icon-user "></i>Group Chat</a></li>
		</ul>
		</div>
	<div data-target=".navbar1" class="span9 pull-right">
		<div id="overview" >
			<legend>Overview</legend>
			<div class="alert alert-success" style="display:inline-block">
			<span class="label label-success text-center span2">Course Title</span><span class="text-success span5"> '.$data['ctitle'].'</span>
			<span class="label label-success  text-center span2">Course Code</span><span class="text-success span5"> '.$data['ccode'].'</span>
			<span class="label label-success  text-center span2">Date Created</span><span class="text-success span5"> '.$odate.'</span>
			<span class="label label-success  text-center span2">Managed By</span><span class="text-success span5"> '.$manager.'</span>
			</div>
		</div>
		<div id="desc" >
			<legend>Description</legend>
			<div class="alert alert-success"><strong>'.$data['cdesc'].'</strong></div>
		</div>';
		
			if($type=="Student"){
			echo '<div id="prog" >
			<legend>Progress</legend>
			<div class="alert alert-success" >';
			include 'cont/getCourseProgress.php';
			echo '</div>';
			}
			echo '
		<div id="event" >
			<legend>Events</legend>
			<div class="alert alert-success" >';
			include 'cont/getCourseEvents.php';
			echo '</div>
		</div>
		<div id="announ" >
			<legend>Announcements</legend>
			<div class="alert alert-success">';
			include 'cont/getCourseAnnouncements.php';
			echo '</div>
		</div>
		<div id="exer" >
			<legend>Lessons</legend>
			<div class="alert alert-success">';include 'cont/getCourseLessons.php';
			echo '</div>
		</div>
		<div id="assign" >
			<legend>Assignments</legend>
			<div class="alert alert-success">';include 'cont/getCourseAssignments.php';
			echo '</div>
		</div>
		<div id="quiz" >
			<legend>Quizzes</legend>
			<div class="alert alert-success">';include 'cont/getCourseQuiz.php';
			echo '</div>
		</div>
		<div id="docs" >
			<legend>Documents</legend>
			<div class="alert alert-success">';include 'cont/getCourseDocuments.php';echo'</div>
		</div>
		<div id="enrollees" >
			<legend>Enrollees</legend>
			<div class="alert alert-success">';include 'cont/getCourseEnrollees.php';echo'</div>
		</div>
		<div style="display:inline-block;height:80%;width:100%;">
			<br/>
		</div>
		<div id="gchat" style="display:inline-block;height:80%;width:100%;">
		<legend>Group Chat</legend>';
		if($_SESSION['name']!="Guest"){
			echo '
		<div class="alert alert-success" style="height:500px;" onload="setInterval(function(){updateChatBox()},1000)">
			
			
			<div class="row-fluid">
				<span id="msgbox" class="span12 well" style="height:300px;max-height:300px;overflow-y:scroll;"></span>
			</div>
			<div class="row-fluid" style="height:100px;max-height:100px;">
				<div class="span12 well">
						<textarea class="span8" id="new_message" name="new_message"
						placeholder="Type in your message" rows="3" style="max-height:110px;height:110px;max-width:600px;width:600px;"></textarea>
						<h6 class="pull-right counter" rel=" " ></h6>
						<button id="postChat" class="btn btn-success btn-small" >Post New Message</button>
				</div>
			</div>	
		</div> 
		
	<script>
		function updateChatBox(){
	var rel1 = "'.$cid.'";
	var lastid1 = $("#msgbox span:last-child").attr("rel"); 
	 $.post( "cont/getMsgBox.php",
	         { cid: rel1 , last : lastid1},
			 function(info) {
			 if(info=="empty"){
				if($("#msgbox").html()!="<strong>No Recent Chats Available.</strong>")
				$("#msgbox").append("<strong>No Recent Chats Available.</strong>");
			 }else if(info=="none"){ }else{
				$("#msgbox").append(info);
				var height = $("#msgbox").prop("scrollHeight");
				$("#msgbox").scrollTop(height);
				}
			});
		}
		
		$("#new_message").keypress(function(e){
		if(e.which == 13){
	var rel1 = "'.$cid.'";
	var uname1 = "'.$_SESSION['name'].'";
	var msg1 = $("#new_message").val();
	if(msg1!=""){
  $.post( "cont/addMsgBox.php",
	         { cid: rel1 , uname: uname1 , msg : msg1},
			 function(info) {
					$("#new_message").val("");
					updateChatBox();
					$("#loader").remove();
		});
		}
		}
		});
		
		$("#postChat").click(function(){
	var rel1 = "'.$cid.'";
	var uname1 = "'.$_SESSION['name'].'";
	var msg1 = $("#new_message").val();
if(msg1!=""){	
	$(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />");
	$.post( "cont/addMsgBox.php",
	         { cid: rel1 , uname: uname1 , msg : msg1},
			 function(info) {
					$("#new_message").val("");
					updateChatBox();
					$("#loader").remove();
				});
		}
		});
		
		</script> '; 
		}else{
		echo '<div class="alert alert-success" >This Group Chat is only available for Students and Teachers.</div> <div tyle="display:inline-block;height:80%;width:100%;">
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div><div tyle="display:inline-block;height:80%;width:100%;">
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>';
		
		}
		
		echo '
		</div>
		</div>
		<div tyle="display:inline-block;height:80%;width:100%;">
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>
	</div>
	</div>
	 
</div>
</div>

';
	if($ismanager==1){
		include 'addEventModal.php';
		include 'addAnnouncementModal.php';
		include 'addAssignmentModal.php';
		include 'addLessonModal.php';
		include 'addQuizModal.php';
	}
	
	?>