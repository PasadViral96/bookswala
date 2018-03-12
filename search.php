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
    <body  class="container-fluid"  background="images/hbg.jpg">
        <div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block"><h1 style="font-size:5vw;"> Bookswala.com</h1></div>
        <div class="tagline-lower text-expanded text-shadow mb-5 d-none d-lg-block"><h1 style="font-size:4vw;"> Great books, great deals.</h1></div>

        <!--Navbar-->
        <div >
                <ul style="list-style: none;">
                <li>
                 <a class="button btn-info" href="home2.php"><button class="button btn-warning .btn-sm value="Home"> Home</a></button>
                </li>
                <br></br>
                <li>
                <a class="button" href="wishlist.php"><button class="button btn-warning .btn-sm value="Wish List"> WishList</a></button>
                </li><br></br>
                <li>
                <a class="button" href="cart.php"><button class="button btn-warning .btn-sm value="Cart">Cart</a></button>
                </li><br></br>
                <li>
                <a class="button" href="logout.php"><button class="button btn-warning .btn-sm value="Log Out">Log Out</a></button>
                </li>
                <li>Search Books:<form action="search.php" method="post">
                    <input type="text" placeholder="Name" id="book-name" onkeyup="getBookName()" name="search">
                    <input type="submit" value="Search" >
                    </form>
                </li>
                </ul>
        </div>
<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "bookswala";

	$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_errno>0)
{
    die('Unable to connect to database ['.$conn->connect_errno.']');
}
$searchname=$_POST['search'];
$querysearch = "SELECT ImageURLS, ISBN, BookTitle, BookAuthor, Publisher, Price FROM books WHERE BookTitle = '$searchname'";
$result = $conn->query($querysearch);

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
        echo "<tr>";
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
        echo "</tr>";

    }
echo "</table>";
}
else
{
    echo "Error: This book does not exist!";
    echo "<br> <a class='button' href='show.php'>Show Books</a>";
    //header("location:show.php");
}
mysqli_close($conn);

?>
         </body>
</html>
