<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  
	  require_once "mod/lessons.php";
		
		$lesson = new lessons();
		$rless = $lesson->find_lessonByCourse($cid);
		$rAcount = mysql_num_rows($rless);
		echo '<script>$("#navless").html('.$rAcount.');</script>';
		if($rAcount>0){
		echo '<table class="tabletable-condensed " style="width:100%;">';
		WHILE($dless = mysql_fetch_array($rless)):
					$atitle = substr($dless['asTitle'], 0, 22);
	$date = new DateTime($dless['asCdate']);
	$ocdate = $date->format('F-d-Y');
	$date = new DateTime($dless['asEndDate']);
	$oedate = $date->format('F-d-Y');
			echo '<tr>
					<td><span class="label label-success  text-center span2">'.$ocdate.'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$atitle.'</strong></span></td>
					<td width=300px><span class="text-success span3">Due by <strong>'.$oedate.'</strong></span></td>
					<td class="span3">'; 
					if($type=="Student" || $type=="Administrator" || $type=="Teacher"){
					echo'
					
					<div id="viewlesson'.$dless['id'].'" class="view modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">'.$dless["asTitle"].'</h3>
  </div>
  <div class="modal-body"><h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$ocdate.'</span></h4><br/>'.$dless["asDesc"].'
  <br/><hr><span class="text-success"><strong >Attachments</strong> '; 
  $rless2 = $lesson->find_lessonuploadsBylessonId($dless['id'],$cid);
  if(mysql_num_rows($rless2)>0){
  WHILE($dless2 = mysql_fetch_array($rless2)):
	echo '<li><a href="less_uploads/'.$dless2['filename'].'" target="_blank">'.$dless2['filename'].'</a></li>';
  
  ENDWHILE;
  }else{
  echo ': None';
  }
  echo'<hr><span class="text-success">Scheduled on <strong >'.$oedate.' </strong></span>
  </div>
  <div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>


<div id="deleteless'.$dless['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">Delete this lesson?</h3>
  </div>
  <div class="modal-body">
	<h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$ocdate.'</span></h4><br/>'.$dless["asTitle"].'
	
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No, keep this less.</button>
	<button  rel="'.$dless['id'].'" class="less btn btn-danger" >Delete this lesson.</button>
  </div>
</div>

<button class="btn btn-success btn-small" href="#viewlesson'.$dless['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-eye-open icon-white"></i> View</button></td><script>			
				$("#viewlesson'.$dless['id'].'").on("hidden", function () {	
				location.reload();});	
		$("#viewlesson'.$dless['id'].'").on("shown", function () {
			var rel1 = "'.$dless['id'].'";
			
	 $.post( "cont/changeLearnStatus.php",
	         { cid: rel1},
			 function(info) {
			});});</script>';
if($type=="Teacher" || $type=="Administrator"){
echo '<td><button class="btn btn-danger btn-small" href="#deleteless'.$dless['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-trash icon-white" data-toggle="tooltip" title="Delete this entry?"></i></button></td>';
				}	}else{
					echo'<button id="viewBtn" class="btn btn-disabled" data-toggle="tooltip" title="Register first to view the lesson"><i class="icon-eye-open icon-white"></i> View</button></td><script>$("#viewBtn").tooltip(); 
					
		
					
					</script>';
					
					
					}
				echo '</tr>';
		ENDWHILE;
		echo '</table>
		<script>
		$(".less").click( function(){
	var rel1 = $(this).attr("rel");
	
 $(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />");
	 $.post( "cont/deleteLesson.php",
	         { cid: rel1},
			 function(info) {
				if( info == "Deleted" ){
					location.reload();
				};
		});
		
			
});
		
		
		</script>';
		
		}
		else{
			echo '<strong >No lessons yet.</strong> ';
		}
	
	
?>