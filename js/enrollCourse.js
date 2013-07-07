function enrollhere(rel){
	var success = 0;
	if($('a[rel='+rel+']').hasClass('disabled')){
	
	}else{
	 $.post( 'cont/enrollStudent.php',
	         { cid: rel},
			 function(info) {
				if( info == 'Enrolled' ){ 
					success=1;
					$("a[rel='"+rel+"']").fadeOut();
					$("span.add-on[name='"+rel+"']").fadeOut();
					$("#prependedInput[name='"+rel+"']").fadeOut();
				};
		});
		}	
}
