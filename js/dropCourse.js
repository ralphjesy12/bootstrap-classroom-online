$('.dropBtn').click( function(){
	var success = 0;
	var rel = $(this).attr('rel');
	$(this).append("<img src='img/loading2.gif' id='loader' />");
	 $.post( 'cont/dropStudent.php',
	         { cid: rel},
			 function(info) {
				if( info == 'Dropped' ){ success=1;
					$("a[rel='"+rel+"']").fadeOut();
				};
				$('#loader').remove();
		});
			
});

$("#backCourses1").click(function(){
	location.reload();
	});
