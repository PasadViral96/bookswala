<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookswala";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}
$isbn = $_POST['ISBNno'];
$uname = $_SESSION["uname"];
$sql = "DELETE FROM `wishlist` WHERE `ISBN` ='".$isbn."' AND  `UserName` = '".$uname."';";

if ($conn->query($sql) === TRUE) 
{
    header("location:wishlist.php");
}
else
{
    header("location:faileduser.html");
}
mysqli_close($conn);
?>
