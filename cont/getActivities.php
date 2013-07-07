<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


	  require_once "mod/user.php";
		
		$users1 = new user();
		if(isset($_GET['v']) && $_GET['v']=='a' ){
		$ruser = $users1->get_allactivity($_SESSION['uid']);
		}else{
		$ruser = $users1->get_activity($_SESSION['uid']);
		}
		$rucount = mysql_num_rows($ruser);
		
		if($rucount>0){
		echo '<table class="table table-condensed" style="width:100%;margin-top:20px;">';
		WHILE($duser = mysql_fetch_array($ruser)):
			$atitle = substr($duser['desc'], 0, 22);
			$atype = substr($duser['type'], 0, 25);
			$date = new DateTime($duser['ts']);
			$odate = date_format( $date,"H:i:s a");
			$odate2 = date_format( $date,"F j, Y");
			echo '<tr>
					<td><span class="label label-success  text-center " data-toggle="tooltip" title="'.$odate2.'">'.$odate.'</span></td>
					<td width=200px><span class="text-success "><strong>'.$atype.'</strong></span></td>
					<td width=200px><span class="text-success "><strong>'.$atitle.'</strong></span></td>
					<td width=80px><button class="btn btn-success btn-small pull-right" href="#viewactivity'.$duser['id'].'" data-toggle="modal"><i class="icon-eye-open icon-white"></i> View</button></td>
				</tr>
				
<div id="viewactivity'.$duser['id'].'" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
						<div class="modal-header">
							<h5 id="myModalLabel1">'.$duser['type'].'</h5>
						</div>
						  <div class="modal-body">
						  <h4><span class="badge badge-success" data-toggle="tooltip" title="'.$odate2.'"><i class="icon-calendar icon-white"></i>'.$odate.'</span></h4><br/>'.$duser["desc"].'
						  <br/>
						  </div>
						  <div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						  </div>
					</div>';
		ENDWHILE;
		echo '</table>
		';
		}else{
		echo '<strong >No Activites yet.</strong> ';
		}
?>