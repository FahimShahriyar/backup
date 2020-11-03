<?php

require_once("connect.php");

$id = $_REQUEST["id"];
$myQuery = "DELETE FROM users WHERE id=$id";
$runQuery = mysqli_query($connect, $myQuery);

	if($runQuery==true){
		if(isset($_REQUEST["page"])){
			$page = $_REQUEST["page"];
			header("location: $page.php?deleted");
		}else{
			echo 1;
		}
	}
	else{
		if(isset($_REQUEST["page"])){
			$page = $_REQUEST["page"];
			header("location: $page.php?deletefaild");
		}else{
			echo 0;
		}
	}

?>