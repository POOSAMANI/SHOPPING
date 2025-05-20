<?php
include("regis.php");
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$name=stripcslashes($name);
$name=mysqli_real_escape_string($con,$name);
$username=stripcslashes($username);
$username=mysqli_real_escape_string($con,$username);
$password=stripcslashes($password);
$password=mysqli_real_escape_string($con,$password);
$email=stripcslashes($email);
$email=mysqli_real_escape_string($con,$email);
$phone=stripcslashes($phone);
$phone=mysqli_real_escape_string($con,$phone);
$address=stripcslashes($address);
$address=mysqli_real_escape_string($con,$address);
$query="INSERT INTO users(name,username,password,email,phone,address)value('$name','$username','$password','$email','$phone','$address')";
$result=mysqli_query($con,$query);
echo"<center>";
if($result)
 header("Location: sign.php");
?>