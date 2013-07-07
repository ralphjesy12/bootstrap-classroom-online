<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<div id="createCourseModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Create New Course</h3>
  </div>
  <div class="modal-body">
    <form id="courseForm" class="form-horizontal" action="cont/newCourse.php" method="POST">
  <fieldset>
    <div id="legend">
      <h3>Basic</h3>
    </div>
    <div class="control-group">
      <label class="control-label"  for="ctitle">Course Title</label>
      <div class="controls">
        <input type="text" id="ctitle" name="ctitle" placeholder="" class="input-xlarge" required="required">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="ccode">Course Code</label>
      <div class="controls">
        <input type="text" id="ccode" name="ccode" placeholder="" class="input-xlarge" required="required">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="cvis">Visibility</label>
      <div class="controls">
        <select id="cvis" name="cvis" class="input-xlarge"  required="required">
			<option value="0" selected>Public</option>
			<option value="1">Private</option>
			<option value="2">Hidden</option>
		</select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="optionsRadios1">Validation</label>
		<div class="controls">
			<label class="radio">
				<input type="radio" name="opt1" id="opt1" value="0" checked> None</label>
			<label class="radio">	<input type="radio" name="opt1" id="opt1" value="1" > Passkey <input type="text" name="passkey" class="input-small"></label>
		</div>
    </div>
    <div class="control-group">
      <label class="control-label" for="optionsRadios1">Course Description</label>
		<div class="controls">
            <textarea rows="3" name="cdesc" class="input-xlarge"></textarea>
		</div>
    </div>
 
  </fieldset>
</form>
  </div>
  <div id="ack4" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="createCourseBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="createCourse" class="btn btn-success">Create Course</button>
  </div>
</div>';


?>