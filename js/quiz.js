$("#addQuestion").click(function(){
	var qCnt = $(this).attr("rel");
	qCnt++;
	var qCode = '<legend>Question # '+qCnt+'</legend><textarea rows="2" rel="'+qCnt+'" style="width:95%;max-width:95%;margin:5px;" placeholder="Type a Question here"></textarea>';
	$(".quest").append(qCode);
	var items = $(".qItems > a.active").html();
	for(var cnt=1; cnt <=items; cnt++){
	var cCode = '<input name="option" rel2="'+cnt+'" rel="'+qCnt+'" rel3="0" type="text" style="width:55%;margin:5px;" placeholder="Type an option here"></input><br/>';
	var cCode2 = '<div class="btn-group" data-toggle="buttons-radio"><button type="button" rel2="'+cnt+'" rel="'+qCnt+'" rel3="1" class="tof btn btn-success active">True</button><button type="button" rel3="0" rel2="'+cnt+'" rel="'+qCnt+'" class="tof btn btn-success">False</button></div>';	
	$(".quest").append(cCode2);
	$(".quest").append(cCode);
	}
	$(this).attr("rel",qCnt);
});

$("#createQuiz").click( function(){
var q = $("#navquiz").html();
var qtitle = $("input[name='qtitle']").val();
var qdate = $("input[name='qdate']").val();
var qcid = $("input[name='cid']").val();
q++;
var allgood = 0;


if(qtitle!="" && $("#addQuestion").attr("rel")!=0){
	$(this).append("<img src='img/loading.gif' id='loader' />");
	$(".quest > textarea").each(function(){
		var cont = $(this).val();
		if(cont==""){ allgood++;}
	});
	$(".quest > input[type='text']").each(function(){
		var cont = $(this).val();
		if(cont==""){ allgood++;}
	});
	
	if(allgood==0){
	
	
					$.post( "cont/newQuiz.php", {qt : qtitle , qd : qdate ,qc : qcid,qid : q} , function(){ $("#loader").remove(); });
						$(".quest > textarea").each(function(){
							var qidd = $(this).attr("rel");
							var qval = $(this).val();
							
							$.post( "cont/newQuizQuestions.php", {qqid : qidd , text : qval ,qid : q ,qc : qcid} , function(info){
								
							});
						});
							
							
					$(".quest > input[type='text']").each(function(){
							var optnum = $(this).attr("rel2");
							var qnum = $(this).attr("rel");
							var optval = $(this).val();
							$.post( "cont/newQuizQuestionsOptions.php", {qid : q , qqid : qnum ,text : optval,qqonum : optnum ,qc : qcid} , function(info){
							});
						});

					$(".quest button.active").each(function(){
						var optnum = $(this).attr("rel2");
						var qnum = $(this).attr("rel");
						var opt = $(this).attr("rel3");
						$.post( "cont/setQuizQuestionsOptions.php", {qid : q , qqid : qnum ,qqonum : optnum,optval:opt ,qc : qcid} , function(info){
						$("#loader").remove();
						
							});
					});	
					$("#ackQuiz").removeClass("hidden");
				   $("#ackQuiz").empty();
				   $("#ackQuiz").html("New Quiz Added.");
				   clearQuizForm();
				    $('#createQuiz').button('Complete');
			 }else{
					$("#ackQuiz").removeClass("hidden");
				   $("#ackQuiz").empty();
				   $("#ackQuiz").html("All fields must not be empty.");
			 }
			 }else{
				$("#ackQuiz").removeClass("hidden");
				   $("#ackQuiz").empty();
				   $("#ackQuiz").html("All fields must not be empty.");
			 }
});

function clearQuizForm() {
	$("#quizForm :input").each( function() {
	      $(this).val("");
	});
	$("#quizForm :textarea").each( function() {
	      $(this).val("");
	});
}