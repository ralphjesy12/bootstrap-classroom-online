<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '
<script src="js/bootstrap-datepicker.js"></script>
<div id="addQuizModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Add New Quiz</h3>
  </div>
  <div class="modal-body">
    <form id="quizForm" class="form-horizontal" action="cont/newQuiz.php" method="POST">
  <fieldset>
    <div class="control-group">
      <label class="control-label"  for="etitle">Quiz Title</label>
      <div class="controls">
        <input type="text" id="etitle" name="qtitle" placeholder="" required="required" class="input-xlarge">
        <input type="hidden" id="cid" name="cid" value="'.$cid.'" class="input-xlarge">
      </div>
    </div>
	<div class="control-group">
      <label class="control-label" for="edesc">Quiz Date</label>
		<div class="controls">
            <div class="input-append date" id="quizDatePick" data-date="'.date("Y-m-j").'" data-date-format="yyyy-mm-dd">
				<input id="edate" name="qdate" class="span2" size="16" type="text" value="'.date("Y-m-d").'" required="required" >
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
		</div>
    </div>
	<div class="control-group">
      <label class="control-label" >Tools</label>
		<div class="controls">
         <div class="btn-toolbar">
			  <a id="addQuestion" rel="0" class="btn btn-success btn-mini"><i class="icon-plus-sign icon-white"></i>Add a Question</a>
				<div class="qItems btn-group" data-toggle="buttons-radio">
				<a class="btn btn-success btn-mini active" data-toggle="tooltip" title="2-Choice Question">2</a>
				<a class="btn btn-success btn-mini" data-toggle="tooltip" title="3-Choice Question">3</a>
				<a class="btn btn-success btn-mini" data-toggle="tooltip" title="4-Choice Question">4</a>
				</div>
			  </div>   
		</div>
    </div>
	<div class="quest"></div>
  </fieldset>

  </form>
  </div>
  <div id="ackQuiz" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="createQuizBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="createQuiz" type="submit"  data-loading-text="Adding Quiz..." class="btn btn-success">Create Quiz</button>
  </div>
</div>
<script src="js/quiz.js"></script>
<script>
$("#quizDatePick").datepicker();
$("#createQuizBackBtn").click( function(){
	location.reload();
});

 
	$("#quizForm").submit( function() {
	   return false;	
	});
 

</script>';


?>