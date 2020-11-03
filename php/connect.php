<?php

$host = "localhost";
$dbUser = "fahim";
$dbPwd = "fahimshahriyar";
$dbName = "testdatabase";

$connect = mysqli_connect($host,$dbUser,$dbPwd,$dbName);

if($connect==false){
	echo"<h1>Error establishing database connection!</h1>";
}
?>