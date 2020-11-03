<?php
	require_once("connect.php");
	$authToken = md5(sha1($_REQUEST["email"].$_REQUEST["password"]));
	
	$myQuery = "SELECT auth_token FROM users WHERE auth_token='$authToken';";
	$runQuery = mysqli_query($connect,$myQuery);
	
	if($runQuery==true){
		if(mysqli_num_rows($runQuery)==1){
			setcookie("authToken",$authToken, time()+(7*24*3600));
			header("location: user.php");
		}
		else{
			header("location: login.php?error");
		}
	}
	else{
		header("location: login.php?dberror");
	}
?>