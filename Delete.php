<html>
<head>
<title> Display the result in HTML Table </title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookswala";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM user where UID ='$_POST[UID]'";
if ($conn->query($sql) === TRUE) {
echo "Record successfully Deleted";
}
else
{
header("location:faileduser.html");
}



mysqli_close($conn);
?>
</body>
</html>