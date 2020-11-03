<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
</head>
<body style="font-family:arial;background:white;">
<script>
	function del(deleteId){
		var go = confirm("Are you sure???");
		if(go){
			$.post("deleteCore.php",{id:deleteId},function(myData){
				$("#"+ deleteId).html("<td colspan='9'><h1 style='margin-left:38%;color:red;'>Row deleted</h1></td>");
			});
		}else{
			
		}
	}
</script>
<div>
<form onsubmit="return false">
<input id="search" type="text" placeholder="Search" name="search" style="border:1px solid black;padding:5px;"/>
<input id="submitButton" style="background:#6f6fd8;border-radius:7px; padding:9px 20px;color:white;" type="submit" value="Search"/></br>
</form>
</div>
<div class="spinner" style="display:none;"><img src="spinner.gif" width="100px" style="margin-left:50%;"/></div>
<div style="display:block;overflow:hidden; padding-top:50px;">
<table style="margin:auto;;border-collapse:collapse;" border="1px solid blue" cellspacing="3px" cellpadding="12px">
<tr>
	<th>SL</th>
	<th>ID</th>
	<th>First Name</th>
	<th id="#deleteId">Last Name</th>
	<th>Email Address</th>
	<th>Password</th>
	<th>Profile picture</th>
	<th>Signup Date</th>
	<th>Action</th>
</tr>

</table>
<script type="text/javascript">
$(document).ready(function(){
	$("#submitButton").click(function(){
		$(".spinner").slideDown("slow");
		var valu =$("input#search").val();
		$.post("ajaxSearchCore.php",{varSearch:valu},function(myData){
			$(".spinner").slideUp("slow");
			$('table').html("<tr><th>SL</th><th>ID</th><th>First Name</th><th>Last Name</th><th>Email Address</th><th>Password</th><th>Profile Picture</th><th>Signup Date</th><th>Action</th>");
			
			$('table').append(myData);
		});
		
		//$.post("ajaxSearchCore.php",{varSearch:$("input#search")},function(myData){});
		//$.post("loginVerificationAjaxCore.php",{fName:firstName,lname:lastName},function(myData){});
		
		
	});
});

</script>
</body>
</html>