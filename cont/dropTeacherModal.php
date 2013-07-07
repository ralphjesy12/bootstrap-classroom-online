<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<div id="removeTeacherModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Manage Teachers</h3>
  </div>
  <div class="modal-body">
	';
	require_once "mod/user.php";
	require_once "mod/course.php";
	$user = new user();
	$course = new course();
	$represult = $user->check_type(2);
	if(mysql_num_rows($represult)>0){
		WHILE($data = mysql_fetch_array($represult)):
			echo '<div class="alert alert-success alert-block">
		<h4><strong>'.ucfirst($data['fname']).' '.ucfirst($data['lname']).'</strong>';
		echo '<a href="#" rel="'.$data['id'].'"  class="dropBtn btn btn-danger span2 pull-right text-center">Suspend</a></h4>';
		$coursecnt = $course->find_coursebycreator($data['id']);
		$cnt = mysql_num_rows($coursecnt);
		echo '<h6>Managed Courses : '.$cnt.'</h6>';
		echo '</div>';
		ENDWHILE;
	
	echo '

  </div>
  
  <div class="modal-footer">
    <button id="backCourses1" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
   </div>
</div>
	  
		<script src="js/dropTeacher.js"></script>
';
}else{
echo '
<div class="alert alert-danger alert-block">
  <h4><strong>No any registered Teachers</strong></h4>
  </div>
   </div>
  
  <div class="modal-footer">
    <button id="backCourses" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
  </div>
</div>
';

}

?>