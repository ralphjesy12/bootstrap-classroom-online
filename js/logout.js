$("#signoutbtn").click( function(){
 
	 $.post( "cont/signout.php",
			 function() {
					var url="index.php";
					window.location.assign(url);
				
			 });
 
});
