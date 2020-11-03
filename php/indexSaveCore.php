<?php

if($_REQUEST["fname"]!="" && $_REQUEST["lname"]!="" && $_REQUEST["email"]!="" && $_REQUEST["password"]!=""){
	require_once("connect.php");
	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	$email = $_REQUEST["email"];
	$usrpwd = md5(sha1($_REQUEST["password"]));
	$authToken = md5(sha1($_REQUEST["email"] . $_REQUEST["password"]));
	$file = $_FILES["profilepic"];
	$fileName = uniqid().".png";
	
	if($file["tmp_name"]==""){
		$myQuery = "INSERT INTO users (fname,lname,email_addr,user_pwd, auth_token) VALUES('$fname','$lname','$email', '$usrpwd', '$authToken');";
		$runQuery = mysqli_query($connect,$myQuery);

		header("location: index.php?inserted");
	}
	else{
		move_uploaded_file($file["tmp_name"],"images/$fileName");
		$myQuery = "INSERT INTO users (fname,lname,email_addr,user_pwd, auth_token, avatar) VALUES('$fname','$lname','$email', '$usrpwd', '$authToken', '$fileName');";
		$runQuery = mysqli_query($connect,$myQuery);

		header("location: index.php?inserted");

	}
}
else{
	header("location: index.php");
}

?>