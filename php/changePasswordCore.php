<?php
	require_once("connect.php");
	$authToken = md5(sha1($_REQUEST["email"].$_REQUEST["oldPassword"]));
	$newPassword = md5(sha1($_REQUEST["newPassword"]));
	$newAuthToken = md5(sha1($_REQUEST["email"].$_REQUEST["newPassword"]));
	
	$myQuery = "SELECT auth_token FROM users WHERE auth_token='$authToken';";
	$runQuery = mysqli_query($connect,$myQuery);
	
	if($runQuery==true){
		if(mysqli_num_rows($runQuery)==1){
			$myQuery = "UPDATE users SET user_pwd='$newPassword',auth_token='$newAuthToken' WHERE auth_token='$authToken';";
			$runQuery = mysqli_query($connect,$myQuery);
			if($runQuery==true){
				header("location: changePassword.php?success");
			}
			else{
				header("location: changePassword.php?dberror");
		
			}	
		}
		else{
			header("location: changePassword.php?error");
		
		}
		
	}
	else{
		header("location: login.php?authErrorDb");
	}
?>