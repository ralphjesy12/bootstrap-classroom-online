<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<div id="enrollCourseModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Available Courses</h3>
  </div>
  <div class="modal-body">
	';
	require_once "mod/course.php";
	$course = new course();
	$represult = $course->find_coursebyvisibility(1);
	if(mysql_num_rows($represult)>0){
		WHILE($data = mysql_fetch_array($represult)):
		
					$pass=0;
					if($data['passkey']!="NONE"){
						$pass++;
						}
			echo '<div class="alert alert-success alert-block">
		<h4><strong>'.ucfirst($data['ctitle']).' '.$data['ccode'].'</strong>';
		$represult2 = $course->find_coursebystudent($_SESSION['uid']);
			
					$good=0;
			if(mysql_num_rows($represult2)>0){
				WHILE($data2 = mysql_fetch_array($represult2)):
					if($data2['courseid']==$data['id']){
						$good++;
						}
				ENDWHILE;
			}
			if($good==0){
			
			if($pass==0){
			echo '<a href="#" rel="'.$data['id'].'" class="enrollBtn btn btn-success span1 pull-right" onclick="enrollhere('.$data['id'].')">Enroll</a>';
			}else{
			echo '
			<div class="pull-right">
			<div class="input-prepend  pull-right" style="margin-left:5px;">
					<span class="add-on" name="'.$data['id'].'" rel="'.$data['passkey'].'" data-toggle="tooltip" title="Click Here to Validate" onclick="validate('.$data['id'].')" ><i rel="'.$data['id'].'" class="iconizer icon-lock " ></i></span>
					<input class="span2" id="prependedInput" rel="'.$data['passkey'].'" name="'.$data['id'].'" type="text" placeholder="Validation Key">
			</div>
			<a href="#" onclick="enrollhere('.$data['id'].')" rel="'.$data['id'].'" class="btn btn-success span1 pull-right  disabled">Enroll</a></div>';
			
			}
				
						
						
						
						}else{ 
						echo '<a class="btn btn-success span1 pull-right disabled">Enrolled</a>';
						}
		echo'
			
			</h4>
		';
		if($data['cvis']=="0") echo '<p>Visible to Anyone</p>';
		if($data['cvis']=="1") echo '<p>Visible only to Registered Students</p>';
		
		echo '
			</div>';
		ENDWHILE;
		
		echo '

  </div>
  
  <div class="modal-footer">
    <button id="backCourses" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    
  </div>
</div>
	  
		<script src="js/enrollCourse.js"></script>
		<script src="js/validateCourse.js"></script>
';
	
}else{
echo '
<div class="alert alert-danger alert-block">
  <h4><strong>No Courses Available at this moment.</strong></h4>
  </div>
   </div>
  
  <div class="modal-footer">
    <button id="backCourses" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
   
  </div>
</div>
';

}
	

?>