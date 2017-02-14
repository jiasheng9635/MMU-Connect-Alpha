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
$tbl_name="event"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 
//mysqli_select_db($con,"$db_name")or die("cannot select DB");

// username and password sent from form 
$name=$_SESSION["myusername"]; 
$id=$_POST["eventContentID"]; 
$calTime=$_POST["edittime"]; 
$venue=$_POST["editvenue"]; 
$content=$_POST["editcontent"]; 
$description=$_POST["editdescription"]; 

$sql="UPDATE $tbl_name SET calTime='$calTime', venue='$venue', content='$content', description='$description' WHERE id='$id'";

if(mysqli_query($con,$sql))
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=MMU Connect.php#event\">";
}
else
{
	echo "<script type='text/javascript'>alert('Edit failed!');window.location.href= 'MMU Connect.php#event'</script>";
}
?>
</body>
</html>