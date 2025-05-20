<?php
include("sign.php");
$username=$_POST['username'];
$password=$_POST['password'];
$username=stripcslashes($username);
$username=mysqli_real_escape_string($con,$username);
$password=stripcslashes($password);
$password=mysqli_real_escape_string($con,$password);
$sql="select * From users where username='$username'and password='$password'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1)
{
echo"login successfully";
 header("Location: main.html");
}
?>
