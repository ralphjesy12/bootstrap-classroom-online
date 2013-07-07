<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

	require_once "mod/course.php";
	require_once "mod/user.php";
		
		echo '
		<ul class="breadcrumb">
  <li><a href="index.php">Home</a> <span class="divider">></span></li>
  <li class="active">Courses</li>
</ul>
<div class="container" >

	<legend>Course Homepage</legend>';
		
		$course = new course();
		$represult = $course->find_coursebyvisibility(0);
		$cnt = 0;
		$getenrollNewCourseModal = 0;
		$getCoursemodal = 0;
	if(mysql_num_rows($represult)>0){
		
	echo '';
		WHILE($data = mysql_fetch_array($represult)):
			$cnt++;
			$rep = $course->find_courseenrolleesById($data['id']);
			$numenrollees = mysql_num_rows($rep);
			$member = new user();
			$represult2 = $member->check_byId($data['ccreator']);
			if(mysql_num_rows($represult2)>0){
				$data2 = mysql_fetch_array($represult2);
				if($data['cdesc']==="") $data['cdesc']="Enrollees are Welcome.";
				}
				$date = date_create($data['cdate']);
				$odate = date_format( $date,"F d, Y");
				$cDesc = substr($data['cdesc'], 0, 72);
				if(strlen($data['cdesc'])>72) $cDesc = $cDesc."...";
	echo '
	<div class="span3">
	<div class="well" style="height:300px;">
		<span class="badge badge-success">'.$data['ccode'].'</span><br/><h5 class="text-success">  '.$data['ctitle'].'</h5>
		<div class="alert alert-success alert-block "><h6><strong>'.$cDesc.'</strong></h6></div>
		<h5></h5>
		<ul class="unstyled">
			<li><span title="Course Manager"><i class="icon-user"></i> '.ucfirst($data2['fname']).' '.ucfirst($data2['lname']).'</span></li>
			<li><span title="Course Creation Date"><i class="icon-calendar"></i> Since '.$odate.'</span></li>
		</ul>
		<hr>';
		
		if($type=="Guest"){
			echo '
		<p><a class="btn btn-large" href="#signupModal" role="button" data-toggle="modal"><i class="icon-ok"></i> Learn more</a></p>';
		}else{
				if($type=="Student"){
					$rep1 = $course->find_coursebystudent($_SESSION['uid']);
					if(mysql_num_rows($rep1)>0){
						$match=0;
						WHILE($drep=mysql_fetch_array($rep1)):
							if($drep['id']==$data['id'])	$match++;
						ENDWHILE;
							
						if($match>0){
							echo '<p><a class="btn btn-info btn-large" href="courses.php?c='.$data['id'].'&"><i style="margin-right:5px;" class="icon-play icon-white"></i>Continue</a></p>';
						}else{
							$getenrollNewCourseModal++;
							echo '<p><a class="btn btn-success btn-large" href="#enrollCourseModal" role="button" data-toggle="modal"><i style="margin-right:5px;" class="icon-thumbs-up icon-white"></i>Enroll Now	</a></p>';
						}
					}else{
						$getCoursemodal++;
						echo '<p><a class="btn btn-success btn-large" href="#enrollCourseModal" role="button" data-toggle="modal"><i style="margin-right:5px;" class="icon-ok icon-white"></i>Enroll Now	</a></p>';
					}
				}else{
					echo '<p><a class="btn btn-success btn-large" href="courses.php?c='.$data['id'].'&"><i  style="margin-right:5px;" class="icon-globe icon-white"></i>Visit Course Page</a></p>';
				}
			}
	echo'</div></div>';
	ENDWHILE;
	echo '';
		if($type=="Guest"){
			include 'cont/signupmodal.php';
		}
		if($getCoursemodal > 0){include 'cont/enrollNewCourseModal.php';}
		if($getenrollNewCourseModal > 0){include 'cont/enrollNewCourseModal.php';}
		echo '</div>';
	}else{
	echo '<div class="alert alert-block">No Available Courses</div>';
	}
	
?>