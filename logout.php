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
        <?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>
    <h3>You have Logged Out. Thank You for shopping with us. </h3>
       <a class="button" href="home.html">Home</a>
    </body>
</html>
                