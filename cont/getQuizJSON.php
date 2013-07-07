<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

require_once "/mod/quizzes.php";
$quiz = new quizzes();
$qcid = $_GET['c'];
$qqid = $_GET['q'];
$rQuiz = $quiz->find_quizByCourseAndId($qcid,$qqid);		
$dQuiz = mysql_fetch_array($rQuiz);		
echo '<script>
var quizJSON = {
    "info": {
        "name":    "'.$dQuiz['qTitle'].'",
        "main":    "<p>Quiz Date : '.$dQuiz['qDate'].'</p>",
        "results": "",
        "level1":  "100%",
        "level2":  "95%",
        "level3":  "90%",
        "level4":  "85%",
        "level5":  "80%" // no comma here
    },
    "questions": [
        
		';
		// Question 1
		$rQuiz1 = $quiz->find_quizquestionByCourseAndId($qcid,$qqid);	
		$qCnt = 0;
		$maxqCnt = mysql_num_rows($rQuiz1);
		if($maxqCnt>0){
		WHILE($dQuiz1 = mysql_fetch_array($rQuiz1)):
			$qCnt++;
          echo  '{ "q": "'.$dQuiz1['text'].'",
            "a": [';
			$qqqid = $dQuiz1['qnum'];
$rQuiz2 = $quiz->find_quizquestionoptionsByCourseAndId($qcid,$qqid,$qqqid);	
		$qqCnt = 0;
		$maxqqCnt = mysql_num_rows($rQuiz2);               
		if($maxqqCnt>0){
		WHILE($dQuiz2 = mysql_fetch_array($rQuiz2)):
			$qqCnt++;
			if($dQuiz2['tof']==1) $option="true";
			else if($dQuiz2['tof']==0) $option="false";
			echo '{"option": "'.$dQuiz2['text'].'", "correct": '.$option.'}';
				if($qqCnt<$maxqqCnt){
				echo ',';
				}
		ENDWHILE;	
			}	
            echo '
			],
			"correct": "<p><span>Thats right!</span> Your answer is correct</p>",
            "incorrect": "<p><span>Uhh no.</span> Thats not what we are looking for.</p>"
			
			}'; 
			if($qCnt<$maxqCnt){
				echo ',';
			}
		ENDWHILE;	
			}
     echo ' 
         // no comma here
    ]
};</script>';

?>