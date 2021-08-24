<?php
    session_start();

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $room = $_POST['room'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "Hotel";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if($conn == false) {
        die('Connect Error('.$conn->connect_error());
    }
    else{
        $stmt ="INSERT INTO hotel (H_ID, H_Name, H_Address, H_Phone, H_Room) values('$id', '$name', '$address', '$phone', '$room')";
        mysqli_query($conn, $stmt);
        $a = $id;
        $b = $room;
        $_SESSION['hotel'] = $a;
        $_SESSION['room'] = $b;
        $_SESSION['count'] = 0;
        header("location:addroom.php");
    }
    $conn->close();



?>