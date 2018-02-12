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
$sql = "INSERT INTO cart (ISBN,UserName)
VALUES('$isbn','$uname')";

if ($conn->query($sql) === TRUE) 
{
    header("location:show.php");
}
else
{
header("location:faileduser.html");
}
mysqli_close($conn);
?>
