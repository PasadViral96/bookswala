<?php
  $user ="root";
  $pass = "";
  $db="bookswala";

  $conn = new mysqli("localhost",$user,$pass,$db);
  if($conn->connect_errno>0)
  {
      die('Unable to connect to database ['.$conn->connect_errno.']');
  }
  $username=$_GET['username'];
  $password=$_GET['pass'];

  $sql = "SELECT * FROM user WHERE UserName = '$username' AND Password = '$password'";
	$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

	$sql2 = "SELECT * FROM admin WHERE UserName = '$username' AND Password = '$password'";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($result2);

    $sql3 = "SELECT * FROM master WHERE UserName = '$username' AND Password = '$password'";
	$result3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_array($result3);
    
    if($row3['UserName'] == "$username" && $row3['Password'] == $password)
    {
        echo "Yes";
	}

    else if($row2['UserName'] == "$username" && $row2['Password'] == $password)
    {
        echo "Yes";
	}
	
	else if($row['UserName'] == $username && $row['Password'] == $password)
    {
        echo "Yes";
	}
	else
        echo "No";
?>