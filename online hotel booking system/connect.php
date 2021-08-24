<?php
    session_start();

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "Hotel";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_ID='$_SESSION['id']'");
    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
    $name = $row["C_Name"];
    $email = $row["C_Email"];
    $password = $row["C_Pass"];
?>