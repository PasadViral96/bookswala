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
        <title>
        Bookswala.com
        </title>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>
        <script>
            $(document).ready(function () {
                $.ajax({
                  url: 'AjaxFiles/rss_parser.php',
                  complete: function (result, status) {
                        document.getElementById('rss').innerHTML = result.responseText;
                    },
                  cache: false
                });
            });
        </script>
    </head>
    
    <body class="container-fluid" background="images/hbg.jpg">
        <div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block">Bookswala.com</div>
        <div class="tagline-lower text-expanded text-shadow text-uppercase mb-5 d-none d-lg-block">Great books, great deals.</div>
        
        <!--Navbar-->
        <div >
                <ul style="list-style: none;">
                <li >
                <a class="button" href="home2.html">Home &nbsp;</a>
                </li>
                <li >
                <a class="button" href="wishlist.php">WishList &nbsp;</a>
                </li>
                <li >
                <a class="button" href="cart.php">Cart &nbsp;</a>
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
        <!-- RSS Feed -->
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10" id="rss-viewer-title-div">
                    <h1 id="rss-viewer-title">Books News!<h1>    
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10" id="rss-viewer-subtitle-div">
                    <h5 id="rss-viewer-subtitle">Powered by BooksBrowse.<h5>    
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="row" id="rss">
            </div>
        </div> 
    </body>
</html>