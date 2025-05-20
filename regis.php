<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <div class="registration-container">
        <h2>Registration Form</h2>
        <form action="dbb.php" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Choose a username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Enter your address" required></textarea>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

            <label for="email">Email ID:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
<?php
$host="localhost";
$name="root";
$username="";
$db_name="reg";
$con=mysqli_connect($host,$name,$username,$db_name);
if(mysqli_connect_errno())
{
 die("Failed to Connect with Mysql".mysqli_connect_errno());
}
?>

