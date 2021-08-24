<?php
    session_start();

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $psw = $_POST['psw'];
    $repsw = $_POST['repsw'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "Hotel";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if($conn == false) {
        die('Connect Error('.$conn->connect_error());
    }
    else{
        $result = mysqli_query($conn, "Select * from reception where R_ID='$id'") 
                    or die("Failed to query database".mysql_error());
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(!($row["R_ID"] == $id) && $psw == $repsw){
            $stmt ="INSERT Into reception (R_ID, R_Name, R_Address, R_Phone, R_Pass) values('$id', '$name', '$address', '$phone', '$psw')";
            mysqli_query($conn, $stmt);
            $_SESSION['error']="";
            header("location:admin1.php"); 
        }
        else if($row["R_ID"] == $id){
            $error="Reception Already Exist";
            $_SESSION['error']=$error;
            header("location:addreception.php");
        }
        else{
            $error="Password Doesn't Match";
            $_SESSION['error']=$error;
            header("location:addreception.php");
        }
        
    }
    $conn->close();



?>