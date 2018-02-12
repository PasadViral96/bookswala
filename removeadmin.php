<?php
    session_start();
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "bookswala";
	
	$conn = mysqli_connect($servername, $username, $password, $db_name);
	
    $username = $_POST['uname'];
    
    $sql = "DELETE FROM `admin` WHERE `admin`.UserName ='$username';";

    if($conn->query($sql) === TRUE)
    {
		header("location:masteradminhome.html");
	}
	else
    {
        header("location:failed.html");
    }
		
?>