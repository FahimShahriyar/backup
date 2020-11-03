<?php
	if(isset($_COOKIE["authToken"])){
		setcookie("authToken","",time()-10);
		header("location: login.php");
	}
?>