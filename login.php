
<?php
    session_start();
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "bookswala";
	
	$conn = mysqli_connect($servername, $username, $password, $db_name);
	
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	
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
        $_SESSION["uname"] = $username;
		header("location:masteradminhome.html");
	}

    else if($row2['UserName'] == "$username" && $row2['Password'] == $password)
    {
        $_SESSION["uname"] = $username;
		header("location:adminhome.html");
	}
	
	else if($row['UserName'] == $username && $row['Password'] == $password)
    {
        $_SESSION["uname"] = $username;
		header("location:home2.html");
	}
	else
		header("location:login.html");
?>