<?php
	if(!isset($_COOKIE["authToken"])){
		header("location: login.php");
	}
	$authToken = $_COOKIE["authToken"];
	require_once("connect.php");
	$myQuery = "SELECT avatar FROM users WHERE auth_token = '$authToken'";
	$runQuery = mysqli_query($connect,$myQuery);
	if($runQuery==true){
		if(mysqli_num_rows($runQuery)==1){
			$myData = mysqli_fetch_array($runQuery);
		}
		else{
			header("location: login.php");
		}
	}
	else{
		header("location: login.php?dberror");
	}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
</head>
<body style="font-family:arial;background:white;">
	<a href="changePassword.php" style="padding:10px;color:blue;">Change Password</a> 
	<a href="logout.php" style="padding:10px;color:blue;">Log out</a>
<div style="width:200px;margin:auto;margin-top:100px;">
	<img width="100%" src="images/<?php echo $myData['avatar']?>" alt="User Image"/>
	<h6 style="text-align:center; font-size:15px"><?php echo $myData['avatar']?></h6>
</div>
</body>
</html>