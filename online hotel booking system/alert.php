<?php
    session_start();

    if(!(isset($_SESSION['id']))){
        header("location: 2login.php");
    }
    else{
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "Hotel";
    
        $alert = "";
        $roomno = $_POST['roomno'];

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        $id = $_SESSION['id'];
        $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_ID='$id'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

        $name = $row["C_Name"];
        $email = $row["C_Email"];
        $password = $row["C_Pass"];
        $hid= $_SESSION['hid'];




        if($roomno==NULL){
            $alert = "No Room was Selected";
        }
        else{
            $alert = "Booking was Successful";
            $count=count($roomno);
            for($i=0; $i<$count; $i++){
                $a=$roomno[$i];

                $rate = mysqli_query($conn, "SELECT R_Amount FROM room WHERE R_NO='$a'");
                $amt = mysqli_fetch_array($rate, MYSQLI_ASSOC);
        
                $amount = $amt["R_Amount"];
                $update = mysqli_query($conn, "UPDATE room SET Availability='NO' WHERE H_ID='$hid' AND R_NO='$a'");
                $insert = mysqli_query($conn, "INSERT INTO booking (C_ID, H_ID, R_NO, Amount) values ('$id', '$hid', '$a', '$amount')");
            }
        }
    }
?>


<!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE>Home
	</TITLE>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</HEAD>
<br>
<CENTER><h1><font color="White"> Online Hotel Booking </font></H1></CENTER>
<hr color="#ffffff" SIZE="10"WIDTH="100%">

<BODY text="yellow" link="#ffffff" alink="#ffffff" vlink="#ffffff">

    <h3>
        <p align="right"><a href="customer1.php"><u>Home</u></a> <a href="book.php"><u>Book</u></a>| <a href="MyAccount.php"><u>My Account</u></a> | <a href="logout.php"><u>LogOut</u></a>
        <FONT COLOR="White" size="5" align="justify">    
            <hr color="white" SIZE="1" WIDTH="100%">
            Welcome, <?php echo $name; ?>... 
    </h3>
        <hr color="white" SIZE="1" WIDTH="100%">
        
        <p align="center">
            <?php echo $alert; ?>
        </p>