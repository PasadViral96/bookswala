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
        
        <title>
        Bookswala.com
        </title>
    </head>
    
    <body class="container-fluid" background="images/hbg.jpg">
        <div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block"><h1 style="font-size:5vw;">Bookswala.com</h1>></div>
        <div class="tagline-lower text-expanded text-shadow mb-5 d-none d-lg-block"><h1 style="font-size:4vw;">Great books, great deals.</h1></div>
        
        <!--Navbar-->
        <div >
                <ul style="list-style: none;">
                <li >
                <a class="button" href="home2.php">Home &nbsp;</a>
                </li>
                <li >
                <a class="button" href="cart.php">Cart &nbsp;</a>
                </li>    
                <li >
                <a class="button" href="wishlist.php">WishList &nbsp;</a>
                </li>
                <li >
                <a class="button" href="logout.php">Log Out &nbsp;</a>
                </li>
                <li>
                <form action="show.php" method="post" >
                <input  class="button" type="submit" value="Show Books"> 
                </form>
                </li>
                </ul>
        </div>
        
        <?php

$user ="root";
$pass = "";
$db="bookswala";

$conn = new mysqli("localhost",$user,$pass,$db);
if($conn->connect_errno>0)
{
    die('Unable to connect to database ['.$conn->connect_errno.']');
}
$username = $_SESSION["uname"]; 
$sql = "SELECT b.ImageURLS, b.ISBN, b.BookTitle, b.BookAuthor, b.Publisher, b.Price 
FROM books b, cart c 
WHERE c.UserName='".$username."'AND b.ISBN= c.ISBN"; //b is very very important
$result = $conn->query($sql);
 $total=0;        
if ($result->num_rows > 0)
{
    echo "<table class='bg-faded table'>";
    echo "<tr>";
    echo "<th>Thumbnail</th>";
    echo "<th>ISBN</th>";
    echo "<th>Book Title</th>";
    echo "<th>Book Author</th>";
    echo "<th>Publisher</th>";
    echo "<th>Price</th>";
    echo "</tr>";
    
   
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td><img src='" . $row["ImageURLS"] . "'></td>";
        echo "<td>" . $row["ISBN"] . "</td>";
        echo "<td>" . $row["BookTitle"] . "</td>";
        echo "<td>" . $row["BookAuthor"] . "</td>";
        echo "<td>" . $row["Publisher"] . "</td>";
        echo "<td>" . $row["Price"] . "</td>";
        $total=$total+$row["Price"];
        echo "</tr>";
        
    }
echo "</table>";
echo "<h1>Your total Price is: " . $total . "</h1>";
}
else
{     
    echo "No Books added to cart";
}
mysqli_close($conn);
?>
    <form action="final.php" method="post">
        <h1>Confirm Payment?</h1>
        <br>
        <input class ="button" type="submit" value="Confirm" >
    </form>    
            </body>
</html>