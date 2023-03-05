<?php
include ("db_connection.php");

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from `logintable` where `CustomerID`=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:display.php');
    } else {
        die (mysqli_error($conn));
    }
}
?>