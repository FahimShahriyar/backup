<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
</head>
<body style="font-family:arial;background:white;">

<div>
<form method="POST" action="search.php">
<input type="text" placeholder="Search" name="search" value="<?php echo $_REQUEST["search"];?>" style="border:1px solid black;padding:5px;"/>
<input style="background:#6f6fd8;border-radius:7px; padding:9px 20px;color:white;" type="submit" value="Search"/></br>
</form>
</div>
<div style="display:block;overflow:hidden; padding-top:50px;">
<table style="margin:auto;;border-collapse:collapse;" border="1px solid blue" cellspacing="3px" cellpadding="12px">
<tr>
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
if(isset($_REQUEST["search"])){
	$search = $_REQUEST["search"];
require_once("connect.php");
$myQuery= "select * from users WHERE fname LIKE'%$search%';";
$runQuery = mysqli_query($connect,$myQuery);
if($runQuery==true){
	$dataCount = mysqli_num_rows($runQuery);
	if($dataCount){
		while($myData = mysqli_fetch_array($runQuery)){?>	
		<tr>
			<td><?php echo $myData["id"]?></td>
			<td><?php echo $myData["fname"]?></td>
			<td><?php echo $myData["lname"]?></td>
			<td><?php echo $myData["email_addr"]?></td>
			<td><?php echo $myData["user_pwd"]?></td>
			<td><img src="images/<?php echo $myData["avatar"]?>"  width="70px"></td>
			<td><?php echo $myData["signupDate"]?></td>
			<td><a href="delete.php?id=<?php echo $myData["id"];?>">Delete</a> | <a href="edit.php?id=<?php echo $myData["id"];?>"">Edit</a></td>
		</tr>	
		<?php
		}
	}
	else{
		echo "Data not found!!";
	}
}
else{
	echo mysqli_error($connect);
}
}
?>

</table>
</div>
</body>
</html>