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
        <link rel="stylesheet" href="jquery-ui-1.11.4\jquery-ui.min.css">
        <script src="jquery-ui-1.11.4\external\jquery\jquery.js"></script>
        <script src="jquery-ui-1.11.4\jquery-ui.min.js"></script>
        <script>
          function getBookName() {
              $.ajax({
                  url: 'AjaxFiles/book_name_giver.php?partial_book_name=' + $("#book-name").val(),
                  complete: function (result, status) {
                      var AllBooks1 = JSON.parse(result.responseText);
                      $("#book-name").autocomplete({
                          source: function (request, response) {
                              var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                              response($.grep(AllBooks1, function (item) {
                                  return matcher.test(item);
                              }));
                          }
                      });
                  },
                  cache: false
              });
          }
        </script>
</head>


<body  class="container-fluid body1"  background="images/hbg.jpg">
<div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block">Bookswala.com</div>
        <div class="tagline-lower text-expanded text-shadow text-uppercase mb-5 d-none d-lg-block">Great books, great deals.</div>

        <!--Navbar-->
        <div >
                <ul style="list-style: none;">
                <li>
                <a class="button" href="home2.php">Home</a>
                </li>
                <li>
                <a class="button" href="wishlist.php">WishList</a>
                </li>
                <li>
                <a class="button" href="cart.php">Cart</a>
                </li>
                <li>
                <a class="button" href="logout.php">Log Out</a>
                </li>
                <li>
                <form action="show.php" method="post" >
                <input  class="button" type="submit" value="Show Books">
                </form>
                </li>
                <li>Search Books:<form action="search.php" method="post">
                    <input type="text" placeholder="Name" id="book-name" onkeyup="getBookName()" name="search">
                    <input type="submit" value="Search" >
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


$sql = "SELECT ImageURLS, ISBN, BookTitle, BookAuthor, Publisher, Price FROM books";
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
    echo "<th>Cart/Wishlist</th>";
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
        $isb[$i]= $row["ISBN"];
        echo "<td> <form action='addtocart.php' name='cartForm' method='post'> <input type='hidden' name='ISBNno'  value =" .$isb[$i] ." /> <input type='submit' class = 'button' value='Add To Cart' /> </form>";
        echo "<form action='addtowishlist.php' name='wishlistForm' method='post'> <input type='hidden' name='ISBNno'  value =" .$isb[$i] ." /> <input type='submit' class = 'button' value='Add To Wishlist' /> </form> </td>";
        $i++;
        echo "</tr> </a>";

    }
echo "</table>";
}
else
{
    header("location:faileduser.html");

}
mysqli_close($conn);
?>

    </body>
</html>
