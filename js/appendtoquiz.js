var buttoncode = '<a class="submitscores btn btn-success">Submit Scores</a>';
$(".quizResultsCopy").append(buttoncode);

$(".submitscores").click(function(){
$(this).append("<img src='img/loading.gif' id='loader' />");
var rel2 = $(".quizResults").attr("rel");
var rel1 = $(".quizLevel > span").html();
 $.post( 'cont/submitQuiz.php',
	         { cid: rel1},
			 function(info) {
				alert(info);
				if(info=="Submitted"){
					window.location.assign("courses.php?c="+rel2);
				}else{
					location.reload();
				}
				$("#loader").remove();
		});

});