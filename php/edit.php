<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
</head>
<body style="font-family:arial;background:white;">

<?php
	require_once("connect.php");
	
	if(isset($_REQUEST["id"]) || isset($_REQUEST["authToken"])){
	if(isset($_REQUEST["id"])){
		$id = $_REQUEST["id"];
		$myQuery= "SELECT * FROM users WHERE id='$id';";
	}
	if(isset($_REQUEST["authToken"])){
		$authToken = $_REQUEST["authToken"];
		$myQuery= "SELECT * FROM users WHERE auth_token='$authToken';";
	}
	$runQuery = mysqli_query($connect,$myQuery);
	
	while($mydata = mysqli_fetch_array($runQuery)){ ?>
<div>
<form enctype="multipart/form-data" method="POST" action="editCore.php?authTokenOld=<?php echo $mydata["auth_token"]?>">
<input type="text" value="<?php echo $mydata["fname"]?>" placeholder="First Name" name="fname" style="border:1px solid black;padding:5px;" required/>
<input type="text" value="<?php echo $mydata["lname"]?>" placeholder="Last Name" name="lname" style="border:1px solid black;padding:5px;" required/>
<input type="email" value="<?php echo $mydata["email_addr"]?>" placeholder="Email Address" name="email" style="border:1px solid black;padding:5px;" required/>
<input type="text" value="" placeholder="Password" name="password" style="border:1px solid black;padding:5px;" required/>
<input type="file" name="profilepic"/>
<input style="background:#6f6fd8;border-radius:5px; padding:9px 20px;color:white;" type="submit" value="Submit"/></br>
</form>
</div>
<?php
	}}
	if(isset($_REQUEST["updated"])){
		echo "<span style='color:blue;'>Data updated</span>";
	}
	if(isset($_REQUEST["updateFaild"])){
		echo "<span style='color:blue;'>Update faild</span>";
	}

?>
<a href="index.php" style="padding:100 px;font-size:40px;">Index</a>
</body>
</html>