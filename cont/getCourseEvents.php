<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  
	  require_once "mod/events.php";
		
		$event = new events();
		$rEvent = $event->find_eventByCourse($cid);
		$rcount = mysql_num_rows($rEvent);
		echo '<script>
			$("#navevents").html('.$rcount.');
		</script>';
		if($rcount>0){
		echo '<table class="tabletable-condensed " style="width:100%;">';
		WHILE($dEvent = mysql_fetch_array($rEvent)):
		$reCreator = $users->check_byId($dEvent['ecreator']);
		$m = $dEvent['ecreator'];
		$manager=0;
		if($m == $_SESSION['uid']) $manager=1;
				$dCreator = mysql_fetch_array($reCreator);
			$eTitle = substr($dEvent['etitle'], 0, 22);
			$eCreator = substr(ucfirst($dCreator['fname']).' '.ucfirst($dCreator['lname']), 0, 22);
	$date = new DateTime($dEvent['edate']);
	$oedate = $date->format('F-d-Y');
			echo '<tr>
					<td><span class="label label-success  text-center span2">'.$oedate.'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$eTitle.'</strong></span></td>
					<td width=300px><span class="text-success span3">Posted by <strong>'.$eCreator.'</strong></span></td>
					<td width=100px>'; 
					if($type=="Student" || $type=="Administrator" || $type=="Teacher"){
					echo'
					
					<div id="viewevent'.$dEvent['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">'.$dEvent["etitle"].'</h3>
  </div>
  <div class="modal-body"><h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$oedate.'</span></h4><br/>'.$dEvent["edesc"].'
  <br/><hr><span class="text-success">Posted by <strong data-toggle="tooltip" title="Course Administrator">'.ucfirst($dCreator['fname']).' '.ucfirst($dCreator['lname']).'</strong></span>
  </div>
  <div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<div id="deleteevent'.$dEvent['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">Delete this event?</h3>
  </div>
  <div class="modal-body">
	<h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$oedate.'</span></h4><br/>'.$dEvent["etitle"].'
	
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No, keep this Event.</button>
	<button  rel="'.$dEvent['id'].'" class="del btn btn-danger" >Delete this event.</button>
  </div>
</div>

<button class="btn btn-success btn-small" href="#viewevent'.$dEvent['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-eye-open icon-white"></i> View</button></td>';
if($type=="Administrator" || $manager==1){
echo '<td><button class="btn btn-danger btn-small" href="#deleteevent'.$dEvent['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-trash icon-white" data-toggle="tooltip" title="Delete this entry?"></i></button></td>';
}

					}else{
					echo'<button id="viewBtn" class="btn btn-disabled" data-toggle="tooltip" title="Register first to view the event"><i class="icon-eye-open icon-white"></i> View</button></td><script>$("#viewBtn").tooltip();</script>';
					}
				echo '</tr>';
		ENDWHILE;
		
		echo '</table>
		<script>
		$(".del").click( function(){
		
	var rel1 = $(this).attr("rel");
	
 $(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />");
	 $.post( "cont/deleteEvent.php",
	         { cid: rel1},
			 function(info) {
				if( info == "Deleted" ){
					location.reload();
					$("#loader").remove();
				};
		});
		
			
});
		</script>
		';
		}
		else{
			echo '<strong >No Events yet.</strong> ';
		}
	
	
?>