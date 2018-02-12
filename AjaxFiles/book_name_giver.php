<?php
  $user ="root";
  $pass = "";
  $db="bookswala";

  $conn = new mysqli("localhost",$user,$pass,$db);
  if($conn->connect_errno>0)
  {
      die('Unable to connect to database ['.$conn->connect_errno.']');
  }
  $partial_book_name=$_GET['partial_book_name'];
  $sql_get_books="SELECT BookTitle FROM books WHERE BookTitle LIKE '".$partial_book_name."%'";
  $resultgetbooks=mysqli_query($conn,$sql_get_books);
  $books1=array();
  if(mysqli_num_rows($resultgetbooks)!=0){
      while($row2 = mysqli_fetch_assoc($resultgetbooks))
      {
          //echo $row2['Name'].'<br />';
          $books1[]=$row2['BookTitle'];
      }
  }

  echo json_encode($books1);
?>
