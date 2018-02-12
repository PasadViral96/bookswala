<?php
     session_start();
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
</head>    
    
    
<body  class="container-fluid"  background="images/hbg.jpg">
<div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block">Bookswala.com</div>
        <div class="tagline-lower text-expanded text-shadow text-uppercase mb-5 d-none d-lg-block">Great books, great deals.</div>
        
        <!--Navbar-->
        <div >
                <ul style="list-style: none;">
                <li >
                <a class="button" href="adminhome.html">Home &nbsp;</a>
                </li>
                <li >
                <a class="button" href="logout.php">Log Out &nbsp;</a>
                </li>
                <li>
                <form action="adminshow.php" method="post" >
                <input  class="button" type="submit" value="Show Books"> 
                </form>
                </li>
                </ul>
                
        </div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookswala";
$flag=0;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
    $sql = "SELECT ISBN from books;"; 
    $result = $conn->query($sql);
if ($result->num_rows > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
     
        if ($row['ISBN'] === $_POST['ISBN']) 
        {
            echo "Book Already Exists, Updating Quantity Now.";
            $updatequery ="UPDATE books SET quantity = ".$_POST['Quantity']." where isbn =".$_POST['ISBN'].";";
            if($conn->query($updatequery) === TRUE)
            {
                echo "<br><br>Quantity Updated";
            }
            $flag=1;
        }
        
    }
    if($flag === 0 )
    {
        echo "New Book Being Added To Stock";
        $insertquery = "INSERT INTO books (`ISBN`,`BookTitle`,`BookAuthor`,`Publisher`,`ImageURLS`,`Price`,`Quantity`)   VALUES('".$_POST['ISBN']."','".$_POST['Bookname']."','".$_POST['Bookauthor']."','".$_POST['Publisher']."','".$_POST['IURL']."',".$_POST['Price'].",".$_POST['Quantity'].");";
        if($conn->query($insertquery) === TRUE)
            {
                echo "<br><br>Entry Added";
            }
    }
}
else
{
    header("location:failed.html");

}

    
    
?>
        
    </body>
</html> 