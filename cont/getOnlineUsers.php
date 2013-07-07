<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

include_once "./mod/user.php";
$id = $_SESSION['uid'];
$user = new user();
$ronline = $user->check_all();
if(mysql_num_rows($ronline)>0){
	$online_counter_stud = 0;
	$online_counter_teach = 0;
	$teach_users = "";
	$stud_users = "";
	WHILE($donline = mysql_fetch_array($ronline)):
	
		$timenow = date("Y-m-d H:i:s");
		$lastact = $donline["lastactivity"];
		
$date1 = new DateTime($timenow);
$date2 = new DateTime($lastact);
$date3 = $date1->diff($date2); 
$oedate3 = $date3->format('%R%H');
if($oedate3>="-1"){
	
	if($donline['id']!=$id){
	if($donline['utype']==0){
		$online_counter_stud++;
		$stud_users = $stud_users.$donline['uname']."<br/>" ;
	}else if($donline['utype']==2){
		$online_counter_teach++;
		$teach_users = $teach_users.$donline['uname']."<br/>" ;
	}
}
	}
	ENDWHILE;

echo '<span class="label label-success pull-right" data-toggle="tooltip" data-html="true" data-placement="bottom" title="'.$teach_users.'">'.$online_counter_teach.' Teachers online</span>';
echo '<span class="pull-right">&nbsp;</span><span class="label label-success pull-right"  data-html="true" data-placement="bottom" data-toggle="tooltip" title="'.$stud_users.'">'.$online_counter_stud.' Students online</span>';
}
					
					
					
				
?>