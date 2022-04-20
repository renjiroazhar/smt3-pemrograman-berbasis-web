<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbjual";
    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if(!$connection) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    };
    // else {
    //     echo "Connected successfully";
    // };
?>