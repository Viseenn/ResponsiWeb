<?php
     $localhost = "localhost";
     $username = "root";
     $password = "";
     $database = "responsi";

     $conn = new mysqli($localhost, $username, $password, $database);
    if($conn->connect_error){
        die("Maaf koneksi gagal !". $connect->connect_error);
    }
?>