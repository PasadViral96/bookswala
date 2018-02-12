<html>
<head>
<title> Display the result in HTML Table </title>
</head>
< body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookswala";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO admin (Password,UserName)
VALUES('$_POST[pass]','$_POST[uname]')";
if ($conn->query($sql) === TRUE) 
{
header("location:adminhome.html");}
else
{
header("location:failed.html");
}

mysqli_close($conn);
?>
</body>
</html>