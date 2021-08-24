<?php
    session_start();

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "Hotel";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    
    if($conn == false) {
        die('Connect Error('.$conn->connect_error());
    }
    else{
        $result = mysqli_query($conn, "Select * from hotel") 
                or die("Failed to query database".mysql_error());
        
    }
?>


<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<br>
<CENTER><h1><font color="White"> Online Hotel Booking </font></H1></CENTER>
<hr color="#ffffff" SIZE="10"WIDTH="100%">

<BODY text="yellow" link="#ffffff" alink="#ffffff" vlink="#ffffff">

	<h3>
    <p align="right"><a href="hotel.php"><u>Hotels</u></a> | <a href="addhotel.php"><u>Add Hotels</u></a> |  <a href="logs.php"><u>Logs</u></a> | <a href="addreception.php"><u>Add Reception</u> | <a href="logout.php"><u>LogOut</u></a>&nbsp&nbsp&nbsp</a></p>
		<FONT COLOR="White" size="5" align="justify">
		<hr color="white" SIZE="1" WIDTH="100%">
	</h3>

    <div class="container">
        <div class="login-box">
        <div class="row">
        <div class="col-md-12 login-left">
            <h1 style="text-align:center"><b>Hotels</b></h1>
            <form action="add.php" method="post">
                <table align="center" border="1px" style="width:600px; line-height:40px;">
                    <t>
                        <th>Hotel ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>No of Rooms</th>
                    </t>
                <?php
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                ?>
                    <tr>
                        <td><?php echo $row['H_ID']; ?></td>
                        <td><?php echo $row['H_Name']; ?></td>
                        <td><?php echo $row['H_Address']; ?></td>
                        <td><?php echo $row['H_Phone']; ?></td>
                        <td><?php echo $row['H_Room']; ?></td>
                    </tr>
                <?php
                    }
                ?>

                </table>
                <br>
            </form>
        </div>
</div>  
</body>
</html>
