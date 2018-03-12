<?php
session_start();
$user ="root";
$pass = "";
$db="bookswala";

$conn = new mysqli("localhost",$user,$pass,$db);
if($conn->connect_errno>0)
{
    die('Unable to connect to database ['.$conn->connect_errno.']');
}

$username = $_SESSION["uname"]; 

?>
<html>
    <head>
        <!--Required charset-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        
        <title>
        Bookswala.com
        </title>
    </head>
    
    <body class="container-fluid" background="images/hbg.jpg">
        <div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block"><h1 style="font-size:5vw;">Bookswala.com</h1></div>
        <div class="tagline-lower text-expanded text-shadow mb-5 d-none d-lg-block"><h1 style="font-size:4vw;">Great books, great deals.</h1></div>
        
        <h2>Your books will be delivered soon!<br>Thank you for Shopping with us <?php echo $username ?> !<br></h2>
        Your Books will be sent to : <br>
        Name: <?php echo $_POST['Name'] ?> <br>
        Email: <?php echo $_POST['Email'] ?> <br>
        Ph No: <?php echo $_POST['phno'] ?> <br>
        Address: <?php echo $_POST['address'] ?> <br>
        <br>
        <h3>Continue Shopping</h3>
        <a href=home2.html>Home</a>
        <br><br>
        <h3>Otherwise, Log Out</h3>
        <a class="button" href="logout.php">Log Out</a>
    </body>
</html>