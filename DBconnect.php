<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    //create the connection
    $conn = mysqli_connect($servername, $username, $password);

    //check the connection
    if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";
 ?>
