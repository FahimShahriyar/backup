<?php	
if(isset($_REQUEST["varSearch"])){
	$search = $_REQUEST["varSearch"];
require_once("connect.php");
$myQuery= "SELECT * FROM users WHERE fname LIKE'%$search%';";
$runQuery = mysqli_query($connect,$myQuery);
if($runQuery==true){
	$dataCount = mysqli_num_rows($runQuery);
	$serial = 0;
	if($dataCount){
		while($myData = mysqli_fetch_array($runQuery)){
			$id = $myData["id"];
			$fname = $myData['fname'];
			$lname = $myData['lname'];
			$imgSrc = $myData["avatar"];
			$email = $myData['email_addr'];
			$password = $myData['user_pwd'];
			$date = $myData['signupDate']; echo "fahim";
			$serial++;
				
			echo"<tr id='$id'>
			<td>$serial</td>
			<td>$id</td>
			<td>$fname</td>
			<td>$lname</td>
			<td>$email</td>
			<td>$password</td>
			<td><img src='images/$imgSrc' width='70px'/></td>
			<td>$date</td>
			<td><a onclick='del($id)' style='color:blue;cursor:pointer; text-decoration:underline;'>Delete</a> | <a target='_blank' style='color:blue;' href='edit.php?id=$id'>Edit</a></td>
		</tr>";
		}
	}
	else{
		echo "<tr><td colspan='9'><h1 style='margin-left:34%;'>Data not found!!</h1></td></tr>";
	}
}
else{
	$error = mysqli_error($connect);
	echo "<tr><td colspan='9'><h1 style='margin-left:34%;'>$error</h1></td></tr>";
}
}
?>