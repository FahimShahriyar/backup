<?php

if($_REQUEST["fname"]!="" && $_REQUEST["lname"]!="" && $_REQUEST["email"]!="" && $_REQUEST["password"]!=""){
	require_once("connect.php");
	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	$email = $_REQUEST["email"];
	$email = $_REQUEST["email"];
	$usrpwd = md5(sha1($_REQUEST["password"]));
	$authTokenOld = $_REQUEST["authTokenOld"];
	$authTokenNew = md5(sha1($_REQUEST["email"] . $_REQUEST["password"]));
	$file = $_FILES["profilepic"];
	$fileName = uniqid().".png";
	
	if($file["tmp_name"]==""){
		$myQuery = "UPDATE users SET fname='$fname',lname='$lname', email_addr='$email', user_pwd='$usrpwd', auth_token='$authTokenNew' WHERE auth_token='$authTokenOld';";
		$runQuery = mysqli_query($connect,$myQuery);

		header("location: edit.php?authToken=$authTokenNew&updated");
	}
	else{
		move_uploaded_file($file["tmp_name"],"images/$fileName");
		$myQuery = "UPDATE users SET fname='$fname',lname='$lname', email_addr='$email', user_pwd='$usrpwd', auth_token='$authTokenNew', avatar='$fileName' WHERE auth_token='$authTokenOld';";
		$runQuery = mysqli_query($connect,$myQuery);

		header("location: edit.php?authToken=$authTokenNew&updated");
	}
}
else{
	$authTokenOld = $_REQUEST["authTokenOld"];
	header("location: edit.php?authToken=$authTokenOld");
}

?>