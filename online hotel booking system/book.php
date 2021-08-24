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
    
        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
        $id = $_SESSION['id'];
        $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_ID='$id'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $name = $row["C_Name"];
        $email = $row["C_Email"];
        $password = $row["C_Pass"];
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
    <p align="right"><a href="customer1.php"><u>Home</u></a> | <a href="book.php"><u>Book</u></a>| <a href="history.php"><u>History</u></a> |  <a href="MyAccount.php"><u>My Account</u></a> | <a href="logout.php"><u>LogOut</u></a>
	<FONT COLOR="White" size="5" align="justify">    
        <hr color="white" SIZE="1" WIDTH="100%">
        Welcome, <?php echo $name; ?>... </font>
	</h3>
    <hr color="white" SIZE="1" WIDTH="100%">
    <FONT COLOR="White" size="5" align="justify">    
    

    <div class="container">
        <div class="login-center">
        <div class="row">
        <div class="col-md-15 login-left">
            <h1 style="text-align:center"><b></b></h1>
            <form action="bookconnect.php" method="post">
                <div class="form-group">
                    <label for="name"><b><font size="5">Search By Hotel:</font></b></label>
                    <input type="text" class="form-control" placeholder="Enter Hotel Name" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Login</button>
               
                <br>
            </form>
        </div>
    </div>


</BODY>
</HTML>