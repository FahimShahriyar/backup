<?php
	if(!isset($_COOKIE["authToken"])){
		header("location: login.php");
	}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<style>
*{margin:0;padding:0;}
	input{
		padding:10px 15px;
		width:415px;
		font-size:15px;
		margin-top:20px;
	}
	#submit{
		width:100%;
		background:#5281d6;
		border:none;
		border-radius:5px;
		color:white;
		padding:12px 15px;
	}
	h1{
		margin-top:60px;
		margin-bottom:20px;
		text-align:center;
	}
</style>
</head>
<body style="font-family:arial;">
<h1>Change Password</h1>
<div style="margin:auto; width:450px;">

	<form action="changePasswordCore.php" method="POST">
		<input required type="email" name="email" placeholder="Email address"/>
		<input required type="password" name="oldPassword" placeholder="Old Password"/>
		<input required type="password" name="newPassword" placeholder="New Password"/>
		<?php
			if(isset($_REQUEST["error"])){
				echo "<span style='color:red;'>Email address or password wrong!!!</span>";
			}
			if(isset($_REQUEST["success"])){
				echo "<span style='color:red;'>Password changed!!!</span>";
			}
		?>
		<input id="submit" type="submit" value="Change Password"/>
	</form>
</div>
<a href="login.php"><h1>Login</h1></a>
</body>
</html>