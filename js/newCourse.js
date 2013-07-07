$("#newCourseLink").click( function(){
	$("#ack4").addClass("hidden");
});
$("#backCourses").click( function(){
	location.reload();
});
$("#createCourseBackBtn").click( function(){
	location.reload();
});

$("#createCourse").click( function(){
 
	$(this).append("<img src='img/loading.gif' id='loader' />");
	 $.post( $("#courseForm").attr("action"),
	         $("#courseForm :input").serializeArray(),
			 function(info) {
			 
			 
				$("#ack4").removeClass("hidden");
			   $("#ack4").empty();
			   $("#ack4").html(info);
				$("#loader").remove();
			 });
 
	$("#courseForm").submit( function() {
	   return false;	
	});
 
});

$("#saveCourse").click( function(){
	$("#ack5").addClass("hidden");
});

$("#saveCourse").click( function(){
 
	$(this).append("<img src='img/loading.gif' id='loader' />");
	 $.post( $("#savecourseForm").attr("action"),
	         $("#savecourseForm :input").serializeArray(),
			 function(info) {
			 
			 
				$("#ack5").removeClass("hidden");
			   $("#ack5").empty();
			   $("#ack5").html(info);
				$("#loader").remove();
			 });
 
	$("#savecourseForm").submit( function() {
	   return false;	
	});
 
});

