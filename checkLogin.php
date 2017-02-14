<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
session_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="TestLogin"; // Database name 
$tbl_name="member"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 
//mysqli_select_db($con,"$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// Encrypt password
$encrypted_password = md5($mypassword);

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$encrypted_password = stripslashes($encrypted_password);
$myusername = mysqli_real_escape_string($con,$myusername);
$encrypted_password = mysqli_real_escape_string($con,$encrypted_password);
$sql="SELECT * FROM $tbl_name WHERE name='$myusername' and password='$encrypted_password'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "MMU Connect.php"
$_SESSION["myusername"] = $myusername;
$_SESSION["mypassword"] = $mypassword;
$_SESSION['login'] = true;
echo "<script type='text/javascript'>window.location.href= 'MMU Connect.php'</script>";
}
else {
	$_SESSION['login'] = false;
	echo "<script type='text/javascript'>alert('Wrong username or password');window.location.href= 'login.php'</script>";
}
?>
</body>
</html>