
		$("#ctitles").change(function () {
		  var str = "";
		  $("#ctitles option:selected").each(function () {
					str += $(this).text() + " ";
		  });
		  
		  $.post( "cont/getCourse.php",{ ctitle: str},
			 function(data) {
			 var obj = jQuery.parseJSON(data);
			 var sel=0;
			 var pass=obj.passkey;
			 
			 if(pass!='NONE'){ sel=1;}
			 else{sel=0;}
				$( "input[name='ctitle1']" ).val(obj.ctitle);
				$( "input[name='ccode1']" ).val(obj.ccode);
				$( "select[name='cvis1']" ).val(obj.cvis);
				$( "select[name='ccreator1']" ).val(obj.ccreator);
				$( "textarea[name='cdesc1']" ).val(obj.cdesc);
				$( "input[name='opt2'][value='"+sel+"']").trigger('click');
				$( "input[name='passkey1']" ).val(obj.passkey);
			 });
		})
		.change();