<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
</head>
<body style="font-family:arial;background:white;">

<div>
<form enctype="multipart/form-data" method="POST" action="indexSaveCore.php">
<input required type="text" placeholder="First Name" name="fname" style="border:1px solid black;padding:5px;"/>
<input required type="text" placeholder="Last Name" name="lname" style="border:1px solid black;padding:5px;"/>
<input required type="email" placeholder="Email Address" name="email" style="border:1px solid black;padding:5px;"/>
<input required type="password" placeholder="Password" name="password" style="border:1px solid black;padding:5px;"/>
<input type="file" value="name.jpg" name="profilepic"/>
<input style="background:#6f6fd8;border-radius:5px; padding:9px 20px;color:white;" type="submit" value="Submit"/></br>
<?php
if(isset($_REQUEST["emtyfild"])){
	echo "<span style='color:red;'>Please complete all fields!!!</span>";
}
if(isset($_REQUEST["inserted"])){
	echo "<span style='color:blue;'>Field inserted!!!</span>";
}
if(isset($_REQUEST["deleted"])){
	echo "<span style='color:red;'>Row Deleted!!!</span>";
}
?>
</form>
</div>
<div style="display:block;overflow:hidden; padding-top:50px;">
<table style="margin:auto;border-collapse:collapse;" border="1px solid blue" cellspacing="3px" cellpadding="12px">
<tr>
	<th>SL</th>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email Address</th>
	<th>Password</th>
	<th>Profile picture</th>
	<th>Signup Date</th>
	<th>Action</th>
</tr>
<?php

require_once("connect.php");
$myQuery= "select * from users;";
$runQuery = mysqli_query($connect,$myQuery);
if($runQuery==true){
	$dataCount = mysqli_num_rows($runQuery);
	if($dataCount){
		$serial=0;
		while($myData = mysqli_fetch_array($runQuery)){ $serial++; ?>	
		<tr>
			<td><?php echo $serial?></td>
			<td><?php echo $myData["id"]?></td>
			<td><?php echo $myData["fname"]?></td>
			<td><?php echo $myData["lname"]?></td>
			<td><?php echo $myData["email_addr"]?></td>
			<td><?php echo $myData["user_pwd"]?></td>
			<td><img src="images/<?php echo $myData["avatar"]?>"  width="70px"></td>
			<td><?php echo $myData["signupDate"]?></td>
			<td><a onclick="return confirm('Are you sure');" href="delete.php?page=index&id=<?php echo $myData["id"];?>">Delete</a> | <a href="edit.php?id=<?php echo $myData["id"];?>"">Edit</a></td>
		</tr>	
		<?php
		}
	}
	else{ ?>
		<tr><td colspan='9'><h1 style='margin-left:34%;color:red;'>Data not found!!</h1></td></tr>
	<?php }
}
else{
	echo mysqli_error($connect);
}

?>

</table>
</div>
</body>
</html>