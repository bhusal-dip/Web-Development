<?php
    session_destroy();

    session_start();

    $error="";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
/*
    $day = $POST_['day'];
    $month = $POST_['month'];
    $year = $POST_['year'];
    $dob = date("D-M-Y", $day, $month, $year);
*/ 
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
        $result = mysqli_query($conn, "Select * from customer where C_Email='$email'") 
                    or die("Failed to query database".mysql_error());
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(!($row["C_Email"] == $email) && $psw == $repsw){
            $stmt ="INSERT Into customer (C_Name, C_Address, C_Email, C_Phone, C_Pass) values('$name', '$address', '$email', '$phone', '$psw')";
            mysqli_query($conn, $stmt);
            header("location:2login.php"); 
        }
        else if($row["C_Email"] == $email){
            $error="User Already Exist";
            $_SESSION['error']=$error;
            header("location:1REGISTER.php");
        }
        else{
            $error="Password Doesn't Match";
            $_SESSION['error']=$error;
            header("location:1REGISTER.php");
        }
    }
    $conn->close();



?>