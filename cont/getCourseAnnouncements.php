<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  
	  require_once "mod/announcements.php";
		
		$announcement = new announcements();
		$rAnnounce = $announcement->find_announcementByCourse($cid);
		$rAcount = mysql_num_rows($rAnnounce);
		echo '<script>$("#navannounce").html('.$rAcount.');</script>';
		
		if($rAcount>0){
		echo '<table class="tabletable-condensed " style="width:100%;">';
		WHILE($dAnnounce = mysql_fetch_array($rAnnounce)):
		$raCreator = $users->check_byId($dAnnounce['acreator']);
				$dCreator = mysql_fetch_array($raCreator);
				$m = $dAnnounce['acreator'];
		$manager=0;
		if($m == $_SESSION['uid']) $manager=1;
			$atitle = substr($dAnnounce['atitle'], 0, 22);
			$aCreator = substr(ucfirst($dCreator['fname']).' '.ucfirst($dCreator['lname']), 0, 22);
	$date = new DateTime($dAnnounce['cdate']);
	$ocdate = $date->format('F-d-Y');
			echo '<tr>
					<td><span class="label label-success  text-center span2">'.$ocdate.'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$atitle.'</strong></span></td>
					<td width=300px><span class="text-success span3">Posted by <strong>'.$aCreator.'</strong></span></td>
					<td width=100px>'; 
					if($type=="Student" || $type=="Administrator" || $type=="Teacher"){
					echo'
					
					<div id="viewannouncement'.$dAnnounce['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">'.$dAnnounce["atitle"].'</h3>
  </div>
  <div class="modal-body"><h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$ocdate.'</span></h4><br/>'.$dAnnounce["adesc"].'
  <br/><hr><span class="text-success">Posted by <strong data-toggle="tooltip" title="Course Administrator">'.ucfirst($dCreator['fname']).' '.ucfirst($dCreator['lname']).' </strong></span>
  </div>
  <div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>


<div id="deleteAnnounce'.$dAnnounce['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
  <div class="modal-header">
    
    <h3 id="myModalLabel1">Delete this Announcement?</h3>
  </div>
  <div class="modal-body">
	<h4><span class="badge badge-success"><i class="icon-calendar icon-white"></i>'.$ocdate.'</span></h4><br/>'.$dAnnounce["atitle"].'
	
  </div>
  <div class="modal-footer">
	<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No, keep this Announce.</button>
	<button  rel="'.$dAnnounce['id'].'" class="ann btn btn-danger" >Delete this Announcement.</button>
  </div>
</div>

<button class="btn btn-success btn-small" href="#viewannouncement'.$dAnnounce['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-eye-open icon-white"></i> View</button></td>';
if($type=="Administrator" || $manager==1){
echo '<td><button class="btn btn-danger btn-small" href="#deleteAnnounce'.$dAnnounce['id'].'" data-toggle="modal" data-backdrop="false" ><i class="icon-trash icon-white" data-toggle="tooltip" title="Delete this entry?"></i></button></td>';
}					
					
					}else{
					echo'<button id="viewBtn" class="btn btn-disabled" data-toggle="tooltip" title="Register first to view the announcement"><i class="icon-eye-open icon-white"></i> View</button></td><script>$("#viewBtn").tooltip();</script>';
					}
				echo '</tr>';
		ENDWHILE;
		
		echo "</table>
		<script>
		$('.ann').click( function(){
		
	var rel1 = $(this).attr('rel');
	";
	echo '
 $(this).append("<img src='; echo "'";echo "img/loading.gif"; echo "'"; echo "id='loader'";echo ' />"); ';
 echo "
	 $.post( 'cont/deleteAnnouncement.php',
	         { cid: rel1},
			 function(info) {
				if( info == 'Deleted' ){
					location.reload();
					$('#loader').remove();
				};
		});
		
			
});
		</script>";
		}
		else{
			echo '<strong >No Announcements yet.</strong> ';
		}
	
	
?>