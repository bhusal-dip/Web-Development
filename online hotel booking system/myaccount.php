<?php
    session_start();
    $error = "";
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
        $address = $row["C_Address"];
        $email = $row["C_Email"];
        $phone = $row["C_Phone"];
        $password = $row["C_Pass"];
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
    <p align="right"><a href="customer1.php"><u>Home</u></a> | <a href="book.php"><u>Book</u></a>| <a href="history.php"><u>History</u></a> |  <a href="MyAccount.php"><u>My Account</u></a> | <a href="logout.php"><u>LogOut</u></a>
	<FONT COLOR="White" size="5" align="justify">    
        <hr color="white" SIZE="1" WIDTH="100%">
	</h3>
    <hr color="white" SIZE="1" WIDTH="100%">
    <FONT COLOR="BLACK" size="5" align="center">    
  
    <div class="container">
        <div class="box">
        <div class="row">
        <div class="col-md-12 login-left">
            <h1 style="text-align:center"><b><u>DETAILS</u></b></h1>
            <form action="passwordchange.php" method="post">
                
                <div class="form-group">
                    <label for="name"><b><font size="5">Username : <?php echo $name; ?></font></b></label><br>
                </div>

                <div class="form-group">
                    <label for="address"><b><font size="5">Address : <?php echo $address; ?></font></b></label><br>
                </div>

                <div class="form-group">
                    <label for="email"><b><font size="5">Email : <?php echo $email; ?></font></b></label><br>
                </div>

                <div class="form-group">
                    <label for="phno"><b><font size="5">Contact No : <?php echo $phone; ?></font></b></label><br>     
                </div>



                <button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Change Password</button>
                </div>
                <br>
            </form>
        </div>
</div>
</body>
</html>
