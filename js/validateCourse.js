function validate(rel){
	var success = 0;
	var inputpass = $('input[name='+rel+']').val();
	var inputpass1 = $('input[name='+rel+']').attr('rel');
	if(inputpass == inputpass1){
		$('a[rel='+rel+']').removeClass('disabled').addClass('enrollBtn');
		$('i[rel='+rel+']').removeClass('icon-remove').removeClass('icon-lock').addClass('icon-ok');
	}else{
		$('i[rel='+rel+']').removeClass('icon-lock').addClass('icon-remove');
		$('input[name='+rel+']').val("");
	}
	
}
