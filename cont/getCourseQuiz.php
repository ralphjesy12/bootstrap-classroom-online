<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

 require_once "mod/quizzes.php";
 require_once "mod/user.php";
		
		$quiz = new quizzes();
		$u = new user();
		$rQuiz = $quiz->find_quizByCourse($cid);
		$user1 = $_SESSION['uid'];
		$rcount = mysql_num_rows($rQuiz);
		echo '<script>$("#navquiz").html('.$rcount.');</script>';
		if($rcount>0){
		echo '<table class="tabletable-condensed " style="width:100%;">';
		WHILE($dQuiz = mysql_fetch_array($rQuiz)):
			
			
		// $m = $dQuiz['ecreator'];
		// $manager=0;
		// if($m == $_SESSION['uid']) $manager=1;
				// $dCreator = mysql_fetch_array($reCreator);
			$eTitle = substr($dQuiz['qTitle'], 0, 22);
			// $eCreator = substr(ucfirst($dCreator['fname']).' '.ucfirst($dCreator['lname']), 0, 22);
	$date = new DateTime($dQuiz['qDate']);
	$date2 = new DateTime($dQuiz['qTs']);
	$oedate = $date->format('F-d-Y');
	$oedate2 = $date2->format('F-d-Y');
	$datenow = date('F-d-Y');
			echo '<tr>
					<td><span class="label label-success  text-center span2">'.$oedate2.'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$eTitle.'</strong></span></td>
					<td width=300px><span class="text-success span3">Exam Date :<strong>'.$oedate.'</strong></span></td>
					<td class="span3">'; 
					if($type=="Student" || $type=="Administrator" || $type=="Teacher"){
					echo'
					<button class="btn btn-success btn-small" href="#viewquiz'.$dQuiz['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-eye-open icon-white"></i> View</button></td>
					
					<div id="viewquiz'.$dQuiz['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">'.$dQuiz["qTitle"].'</h3>
  </div>
  <div class="modal-body"><h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>Quiz Date : '.$oedate.'</span></h4><br/>';
  if($type=="Teacher"){
	$fquiz = $quiz->find_quizresultsByCourse($cid,$dQuiz['id']);
	if(mysql_num_rows($fquiz)>0){
		echo '<hr><h4>Quiz Results</h4><ul class="unstyled">';
		WHILE($dfquiz=mysql_fetch_array($fquiz)):
			$uu = $u->check_byId($dfquiz['studid']);
			$duu = mysql_fetch_array($uu);
			echo '<li><span class="badge badge-success">'.$dfquiz['score'].'</span>&nbsp;<span data-toggle="tooltip" data-placement="right" title="'.$duu['regid'].'">'.$duu['lname'].','.$duu['fname'].'<li>';
		ENDWHILE;
		echo '</ul>';
	}else{
		echo '<strong>None of the Students took this Quiz yet.</strong>';
	}
  }
  echo '
  </div>
  <div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<div id="deletequiz'.$dQuiz['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">Delete this quiz?</h3>
  </div>
  <div class="modal-body">
	<h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$oedate.'</span></h4><br/>'.$dQuiz["qTitle"].'
	
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No, keep this Quiz.</button>
	<button  rel="'.$dQuiz['id'].'" class="del btn btn-danger" >Delete this quiz.</button>
  </div>
</div>

';
if($type=="Administrator"||$type=="Teacher"){
echo '<td><button class="btn btn-danger btn-small" href="#deletequiz'.$dQuiz['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-trash icon-white" data-toggle="tooltip" title="Delete this entry?"></i></button></td>';
				}
if($type=="Student"){
$date1 = new DateTime($datenow);
$date2 = new DateTime($oedate);
$date3 = $date1->diff($date2); 
$oedate3 = $date3->format('%R%a');
if(($oedate3)<0){
echo '<td><a class="btn btn-danger btn-small disabled"  data-toggle="tooltip" title="Exam Date : '.$oedate.'"  ><i class="icon-ok icon-white"></i>Expired</a></td>';
	}else if($datenow!=$oedate){
echo '<td><a class="btn btn-inverse btn-small disabled"  data-toggle="tooltip" title="Exam Date : '.$oedate.'"  ><i class="icon-ok icon-white"></i>Upcoming</a></td>';
	}else{
		$rQuiz3 = $quiz->find_quizresultsByCourseAndId($cid,$dQuiz['qid'],$user1);
		if(mysql_num_rows($rQuiz3)>0){
			$dQuiz3=mysql_fetch_array($rQuiz3);
			echo '<td><a class="btn btn-warning btn-small disabled" data-toggle="tooltip" title="'.$dQuiz3['score'].'" ><i class="icon-ok icon-white"></i>Taken</a></td>';
		}else{
	echo '<td><a class="btn btn-warning btn-small"  data-toggle="tooltip" title="Take the Quiz" href="quiz.php?q='.$dQuiz['qid'].'&c='.$cid.'&" ><i class="icon-ok icon-white"></i>Start</a></td>';
	}
}
}

				}
				echo '</tr>';
		ENDWHILE;
		
		echo "</table>
		<script>
		$('.del').click( function(){
		
	var rel1 = $(this).attr('rel');
	
 $(this).append('<img src="; echo '"img/loading2.gif"'; echo 'id="loader"';echo " />');
	 $.post( 'cont/deleteQuiz.php',
	         { cid: rel1},
			 function(info) {
				if( info == 'Deleted' ){
					location.reload();
					
				};
				$('#loader').remove();
		});
		
			
});
		</script>
		";
		}
		else{
			echo '<strong >No quizzes yet.</strong> ';
		}
	
	
?>