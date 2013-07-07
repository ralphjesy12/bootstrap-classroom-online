<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<div id="dropCourseModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Enrolled Courses</h3>
  </div>
  <div class="modal-body">
	';
	require_once "mod/course.php";
	$course = new course();
	$represult = $course->find_coursebystudent($_SESSION['uid']);
	if(mysql_num_rows($represult)>0){
		WHILE($data = mysql_fetch_array($represult)):
			echo '<div class="alert alert-success alert-block">
		<h4><strong>'.ucfirst($data['ctitle']).' '.$data['ccode'].'</strong>';
			
						echo '<a href="#" rel="'.$data['id'].'"  class="dropBtn btn btn-danger span1 pull-right">Drop</a></h4>';
		if($data['cvis']=="0") echo '<p>Visible to Anyone</p>';
		if($data['cvis']=="1") echo '<p>Visible only to Registered Students</p>';
		
		echo '
			</div>';
		ENDWHILE;
	
	echo '

  </div>
  
  <div class="modal-footer">
    <button id="backCourses1" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
   </div>
</div>
	  
		<script src="js/dropCourse.js"></script>
';
}else{
echo '
<div class="alert alert-danger alert-block">
  <h4><strong>You are not enrolled to any of the courses.</strong></h4>
  </div>
   </div>
  
  <div class="modal-footer">
    <button id="backCourses" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
  </div>
</div>
';

}

?>