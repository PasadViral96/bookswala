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
$sql1 = "SELECT * FROM user WHERE UserName = '".$username."';";
$result1 = $conn->query($sql1);
while ($row = mysqli_fetch_assoc($result1))
{
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
      
      <script type="text/javascript">
      function validate()
      {
      
         if( document.myForm.Name.value == "" )
         {
            alert( "Please provide your name!" );
            document.myForm.Name.focus() ;
            return false;
         }
          
         var emailID = document.myForm.Email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct email ID")
            document.myForm.Email.focus() ;
            return false;
         }
         
         if( document.myForm.phno.value == "" ||
         isNaN( document.myForm.phno.value ) ||
         document.myForm.phno.value.length != 10 )
         {
            alert( "Please provide a legit phone no." );
            document.myForm.phno.focus() ;
            return false;
         }
        
          
          if( document.myForm.address.value == "" )
         {
            alert( "Please provide your address!" );
            document.myForm.address.focus() ;
            return false;
         }
          
         return( true );
      }
</script>
      
   </head>
   
    <body class="container-fluid" background="images/hbg.jpg">
              <div class="tagline-upper text-heading text-shadow mt-5 d-none d-lg-block"><h1 style="font-size:5vw;">Bookswala.com</h1></div>
              <div class="tagline-lower text-expanded text-shadow mb-5 d-none d-lg-block"><h1 style="font-size:4vw;">Great books, great deals.</h1></div>
        
        <div class="container">
                    
                    <div class="tagline-lower text-expanded text-shadow text-uppercase  mb-5 d-none d-lg-block">Details</div>
                    <form action="delivery.php" name="myForm" onsubmit="return(validate());" method="post">
                        
                        Name:
                        <input type="text" name="Name" value ="<?php echo $row["Name"] ?>" />
                        <br>
                        <br>
           
                        Email:
                        <input type="text" name="Email" value ="<?php echo $row["EmailID"] ?>" />
                        <br>
                        <br>
            
                        Ph No:
                        <input type="text" name="phno" value ="<?php echo $row["PhNo"] ?>"/>
                        <br>
                        <br>
                        
                        Address:
                        <input type="text" name="address" value ="<?php echo $row["Address"] ?>"/>
                        <br>
                        <br>
                        
                        <input type="submit" value="Buy" />
                    </form>
            <?php }?>
       </div>
    </body>
</html>