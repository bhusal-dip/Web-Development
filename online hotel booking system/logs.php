<?php
    session_start();


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "Hotel";
    
        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
        $id = $_SESSION['id'];
        $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_ID='$id'");
        $book = mysqli_query($conn, "SELECT * from record");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $name = $row["C_Name"];
        $email = $row["C_Email"];
        $password = $row["C_Pass"];
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
<CENTER><h1><font color="White"> ADMIN </font></H1></CENTER>
<hr color="#ffffff" SIZE="10"WIDTH="100%">

<BODY text="yellow" link="#ffffff" alink="#ffffff" vlink="#ffffff">

	<h3>
    <p align="right"><a href="hotel.php"><u>Hotels</u></a> | <a href="addhotel.php"><u>Add Hotels</u></a> |  <a href="logs.php"><u>Logs</u></a> | <a href="addreception.php"><u>Add Reception</u> | <a href="logout.php"><u>LogOut</u></a>&nbsp&nbsp&nbsp</a></p>
		<FONT COLOR="White" size="5" align="justify">
		<hr color="white" SIZE="1" WIDTH="100%">
	</h3>

    <div class="container">
        <div class="row">
        <div class="col-md-13 login-left">
            <h1 style="text-align:center"><b>Hotels</b></h1>


                <table align="center" border="2px" style="width:1200px; line-height:30px;">
                    <t>
                        <th>Booking ID</th>
                        <th>Cusomer ID</th>
                        <th>Hotel ID</th>
                        <th>Room No</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </t>
                    <tr><td></td></tr>
                <?php
                        while($row = mysqli_fetch_array($book, MYSQLI_ASSOC))
                        {
                ?>
                    <tr>
                        <td><?php echo $row['B_ID']; ?></td>
                        <td><?php echo $row['C_ID']; ?></td>
                        <td><?php echo $row['H_ID']; ?></td>
                        <td><?php echo $row['R_NO']; ?></td>
                        <td><?php echo $row['Amount']; ?></td>
                        <td><?php echo $row['Remark']; ?></td>
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