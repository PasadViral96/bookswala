<?php
    set_time_limit(0);
    function curl_get_contents($url)
    {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
    }
    $user ="root";
    $pass = "";
    $db="bookswala";
    $conn = new mysqli("localhost",$user,$pass,$db);
    if($conn->connect_errno>0)
    {
        die('Unable to connect to database ['.$conn->connect_errno.']');
    }
    $sql_get_books="SELECT * FROM books";
    $resultgetbooks=mysqli_query($conn,$sql_get_books);
    $final_num = 0;
    $api_key = "AIzaSyDZcBQJBtqDYx46sHD8oZZkGg6xFX5yN54";
    if(mysqli_num_rows($resultgetbooks)!=0)
    {
        while($row2 = mysqli_fetch_assoc($resultgetbooks))
        {
            $response = curl_get_contents('https://www.googleapis.com/books/v1/volumes?q=isbn:'.$row2["ISBN"].'&key='.$api_key);
            // echo $response;
            $response = json_decode($response);
            $sql_update_img = "UPDATE books SET ImageURLS='".$response->items[0]->volumeInfo->imageLinks->thumbnail."' WHERE ISBN='".$row2['ISBN']."'";
            if(mysqli_query($conn,$sql_update_img))
            {
                echo $row2["BookTitle"]." updated.";
                echo "<br/>";
                $final_num++;
            }            
        }
    }
    echo "Final number of updated books:".$final_num;
    mysqli_close($conn);
?>