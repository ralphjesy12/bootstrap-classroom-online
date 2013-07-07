<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

if($type=="Administrator"){
	$represult = $course->find_courseall();
	$teach = new user();
	$rep = $teach->check_type(2);
	}
else if($type=="Teacher")	$represult = $course->find_coursebycreator($_SESSION['uid']);
$cnt = mysql_num_rows($represult);
if($cnt>0){
echo '
<div id="editCourseModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Edit existing Course</h3>
  </div>
  <div class="modal-body">
  
	<form id="savecourseForm" class="form-horizontal" action="cont/saveCourse.php" method="POST">
  <fieldset>
    <div id="legend">
      <h3>Select a Course</h3>
    </div> 
	<div class="control-group">
      <label class="control-label" for="cvis">Course Title</label>
      <div class="controls">
        <select id="ctitles" name="ctitles" class="input-xlarge">
		';
	
		WHILE($data = mysql_fetch_array($represult)):
			echo '<option value="'.$data['ctitle'].'"> '.$data['ctitle'].'</option>';
		ENDWHILE;
	
	echo '
		</select>
      </div>
    </div>
	<script src="js/getCourse.js"></script>
	
    <div id="legend">
      <h3>Basic</h3>
    </div>
    <div class="control-group">
      <label class="control-label"  for="ctitle">Course Title</label>
      <div class="controls">
        <input type="text" id="ctitle" name="ctitle1" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="ccode">Course Code</label>
      <div class="controls">
        <input type="text" id="ccode" name="ccode1" placeholder="" class="input-xlarge">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="cvis">Course Instructor</label>
      <div class="controls">
        <select id="ccreator" name="ccreator1" class="input-xlarge">';
		if(mysql_num_rows($rep)>0){
		WHILE($tdata = mysql_fetch_array($rep)):
			echo '<option value="'.$tdata['id'].'"> '.ucfirst($tdata['fname'])." ".ucfirst($tdata['lname']).'</option>';
		ENDWHILE;
		}else{
			echo '<option value="0" selected>No Registered Teachers</option>';
		}
		echo '
		</select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="cvis">Visibility</label>
      <div class="controls">
        <select id="cvis" name="cvis1" class="input-xlarge">
			<option value="0">Public</option>
			<option value="1">Private</option>
			<option value="2">Hidden</option>
		</select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="optionsRadios1">Validation</label>
      <div class="controls">
        <label class="radio">
		<input type="radio" name="opt2" id="opt1" value="0" checked> None</label>
		<label class="radio">	
		<input type="radio" name="opt2" id="opt1" value="1" > Passkey <input type="text" name="passkey1" class="input-small"></label>
		
      </div>
    </div>
  <div class="control-group">
      <label class="control-label" for="optionsRadios1">Course Description</label>
		<div class="controls">
            <textarea rows="3" name="cdesc1" class="input-xlarge"></textarea>
		</div>
    </div>
  </fieldset>
</form>
  </div>
  <div id="ack5" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="backCourses" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="saveCourse" class="btn btn-success">Save Changes</button>
  </div>
</div>';
}else{

echo '
<div id="editCourseModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Edit existing Course</h3>
  </div>
  <div class="modal-body">
		<div class="alert alert-danger"><h4>No Available Courses to Edit</h4></div>
	</div>
  <div class="modal-footer">
    <button id="backCourses" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
  </div>
</div>';
}
?>