<?php
    session_start();

    if(!(isset($_SESSION['id']))){
        header("location: home.php");
    }
    else{
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "Hotel";
    
        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
        $id = $_SESSION['id'];
        $sql = mysqli_query($conn, "SELECT * FROM reception WHERE R_ID='$id'");
        $book = mysqli_query($conn, "CALL `paid`()");
        
        
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);


        $name = $row["R_Name"];
        $address = $row["R_Address"];
        $phone = $row["R_Phone"];
        $password = $row["R_Pass"];
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
    <p align="right"><a href="reception1.php"><u>Bookings&nbsp</u></a> <a href="record.php"><u>Records</u></a> | <a href="logout.php"><u>LogOut</u></a>
	<FONT COLOR="White" size="5" align="justify">    
        <hr color="white" SIZE="1" WIDTH="100%">
        Welcome, <?php echo $name; ?>... </font>
	</h3>
    <hr color="white" SIZE="1" WIDTH="100%">
    <FONT COLOR="White" size="5" align="center">    
    

    <div class="container">
        <div class="login-center">
        <div class="row">
        <div class="col-md-15 login-left">
            <h1 style="text-align:center"><b>BOOKING DETAILS</b></h1> 

                <table align="center" border="2px" style="width:1200px; line-height:30px;">
                    <t>
                        <th>Booking ID</th>
<!-- 
                        <th>Customer Name</th>                   
                        <th>Hotel Name</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Room No</th>
-->
                        <th>Status</th>
                    </t>
                    <tr><td></td></tr>
                <?php
                        while($row = mysqli_fetch_array($book, MYSQLI_ASSOC))
                        {
                ?>
                    <tr>
                        <td><?php echo $row['B_ID']; ?></td>
<!--
                        <td><?php $cid = $row['C_ID'];
                                    echo $cid;
                                    $query = mysqli_query($conn, "SELECT * From customer where C_ID='$cid'");
                                    $now = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                    echo $now["C_Name"]; ?></td>
                        <td><?php   $hid = $row['H_ID'];
                                    $result = mysqli_query($conn, "SELECT * FROM hotel WHERE H_ID='$hid'"); 
                                    $ans = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    echo $ans['H_Name']; ?></td>
                        <td><?php echo $now['C_Address']; ?></td>
                        <td><?php echo $now['C_Phone']; ?></td>
                        <td><?php echo $now['R_NO']; ?></td>
-->
                        <td><?php echo $row['Status']; ?></td>
               
                  </tr>
                <?php
                        }
                ?>

            </table>

        </div>
</div>   

                    </font>
	<hr color="white" SIZE="1" WIDTH="100%">

</BODY>
</HTML>