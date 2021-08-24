<?php
    session_start();

    $room = $_SESSION['count'];
    $id = $_SESSION['hotel'];
    $service = $_POST['service'];
    $amount = $_POST['amount'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "Hotel";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if($conn == false) {
        die('Connect Error('.$conn->connect_error());
    }
    else{
        $stmt ="INSERT INTO room (R_NO, H_ID, R_Type, R_Amount) values('$room', '$id', '$service', '$amount')";
        mysqli_query($conn, $stmt);
        header("location:addroom.php");
    }
    $conn->close();



?>