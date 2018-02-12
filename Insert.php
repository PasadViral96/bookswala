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




$sql = "INSERT INTO user (UID,Name,Address,EmailID,Mobile,Password)
VALUES('$_POST[UID]','$_POST[Name]','$_POST[Address]','$_POST[EmailID]','$_POST[Mobile]','$_POST[Password]')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";

}
else
{
echo "Error: " . $sql . "<br>" . $conn->error;
}




mysqli_close($conn);
?>
</body>
</html>