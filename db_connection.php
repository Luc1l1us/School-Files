<?php 
    $conn = mysqli_connect("localhost", "root", "", "logintest");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>