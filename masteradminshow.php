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
    
    
<body  class="container-fluid body1"  background="images/hbg.jpg">
<div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block">MasterAdmin Panel</div>
        <div class="tagline-lower text-expanded text-shadow text-uppercase mb-5 d-none d-lg-block">Admin Controls.</div>
        
        <!--Navbar-->
        <div >
                <ul style="list-style: none;">
                <li >
                <a class="button" href="adminadd.html">Add Another Admin &nbsp;</a>
                </li>
                <li >
                <a class="button" href="removeuser.html">Remove A User &nbsp;</a>
                </li>
                <li >
                <a class="button" href="removeadmin.html">Remove An Admin &nbsp;</a>
                </li>
                <li >
                <a class="button" href="logout.php">Log Out &nbsp;</a>
                </li>
                <li>
                <form action="masteradminshow.php" method="post" >
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


$sql = "SELECT ImageURLS, ISBN, BookTitle, BookAuthor, Publisher, Price, Quantity FROM books";
$result = $conn->query($sql);

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
    echo "<th>Quantity</th>";
    echo "</tr>";
    
    $isb = array();
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<a id='".$row["BookTitle"]."'><tr id='tablerow'>";
        echo "<td><img src='" . $row["ImageURLS"] . "'></td>";
        echo "<td>" . $row["ISBN"] . "</td>";
        echo "<td>" . $row["BookTitle"] . "</td>";
        echo "<td>" . $row["BookAuthor"] . "</td>";
        echo "<td>" . $row["Publisher"] . "</td>";
        echo "<td> Rs" . $row["Price"] . "</td>";
        echo "<td> " . $row["Quantity"] . "</td>";
        $isb[$i]= $row["ISBN"];
        $i++;
        echo "</tr> </a>";
        
    }
echo "</table>";
}
else
{     
    echo "Error:This user does not exist";
}
mysqli_close($conn);
?>
    
    </body>
</html>    