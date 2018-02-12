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

$sql = "INSERT INTO user (Name,EmailID,PhNo,Password,UserName,Address)
VALUES('$_POST[Name]','$_POST[Email]','$_POST[phno]','$_POST[pass]','$_POST[uname]','$_POST[address]')";
if ($conn->query($sql) === TRUE) 
{
header("location:login.html");}
else
{
header("location:register.html");
}

mysqli_close($conn);
?>
</body>
</html>