<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */

echo '

<div id="openChatModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="800px">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Group Chat</h3>
  </div>
  <div class="modal-body">
  <div id="mychat"><a href="http://www.phpfreechat.net"></a></div>
  </div>
  <div id="ackAssign" class="alert hidden"></div>
  <div class="modal-footer">
    <button id="createAssignBackBtn" class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
    <button id="createAssign" type="submit" class="btn btn-success" >Create Assign</button>
  </div>
</div>

<script type="text/javascript">
	function refreshChat(task)
	{
	
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    }
  }
  var cid = $("#cid1").val();
  var max = $("#navassign").html();
xmlhttp.open("POST","cont/addAssignUpload.php?f="+task.FileName+"&c="+cid+"&a="+max,true);
xmlhttp.send();
	}
	';


?>