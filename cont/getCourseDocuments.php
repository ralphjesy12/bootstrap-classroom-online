<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

$crs = $cid;
$sid = $_SESSION['uid'];
require_once "mod/lessons.php";
require_once "mod/assignments.php";
$lessons = new lessons();
$assignments = new assignments();
$rLesson = $lessons->find_lessonByCourse($crs);
$rAssign = $assignments->find_assignmentByCourse($crs);
$cnt=0;
if(mysql_num_rows($rLesson)>0){
	echo '<table>';
	WHILE($dLesson = mysql_fetch_array($rLesson)):
		$lid = $dLesson['id'];
		$rLesson2 = $lessons->find_lessonuploadsBylessonId($lid,$cid);
		if(mysql_num_rows($rLesson2)>0){
		$dLesson2 = mysql_fetch_array($rLesson2);
		$cnt++;
		$atitle = substr($dLesson2['filename'], 0, 18);
	$date = new DateTime($dLesson['asCdate']);
	$ocdate = $date->format('F-d-Y');
	$oedate = $date->format('F-d-Y');
			echo '<tr>
					<td><span class="label label-success span2 text-center">'.$dLesson['asTitle'].'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$atitle.'</strong></span></td>
					<td width=300px><span class="text-success span3">Uploaded : <strong>'.$oedate.'</strong></span></td>
					<td class="span3">
					<a class="btn btn-success btn-small" href="less_uploads/'.$dLesson2['filename'].'"><i class="icon-eye-open icon-white"></i> Download</a></td>
			</tr>'; 
		}
	ENDWHILE;
	echo '</table>';
	}
if(mysql_num_rows($rAssign)>0){
	echo '<table>';
	WHILE($dAssign = mysql_fetch_array($rAssign)):
		$lid = $dAssign['id'];
		$rAssign2 = $assignments->find_assignuploadsByAssignId($lid,$cid);
		if(mysql_num_rows($rAssign2)>0){
		$dAssign2 = mysql_fetch_array($rAssign2);
		$cnt++;
		$atitle = substr($dAssign2['filename'], 0, 18);
	$date = new DateTime($dAssign['asCdate']);
	$ocdate = $date->format('F-d-Y');
	$oedate = $date->format('F-d-Y');
			echo '<tr>
					<td><span class="label label-success span2 text-center">'.$dAssign['asTitle'].'</span></td>
					<td width=200px><span class="text-success span2"><strong>'.$atitle.'</strong></span></td>
					<td width=300px><span class="text-success span3">Uploaded : <strong>'.$oedate.'</strong></span></td>
					<td class="span3">
					<a class="btn btn-success btn-small" href="assign_uploads/'.$dAssign2['filename'].'"><i class="icon-eye-open icon-white"></i> Download</a></td>
			</tr>'; 
		}
	ENDWHILE;
	echo '</table>';
	}
	echo '<script>$("#navdocs").html('.$cnt.');</script>';
	if($cnt==0){
	echo '<strong>No Documents Yet.</strong>';
	}

?>