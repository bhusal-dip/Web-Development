<?php
    session_start();
    $alert = "";
    
    if(isset($_SESSION['alert'])){
        $alert = $_SESSION['alert'];
    }

    if(isset($_SESSION['done'])){

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "Hotel";

        $opsw = $_POST['email'];
        $psw = $_POST['psw'];
        $repsw = $_POST['repsw'];
    
        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
        $id = $_SESSION['id'];
        $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_ID='$id'");

        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $name = $row["C_Name"];
        $email = $row["C_Email"];
        $password = $row["C_Pass"];

        if($password == $opsw && $psw == $repsw){
            $stmt ="UPDATE customer SET C_Pass='$psw' where C_ID='$id'";
            mysqli_query($conn, $stmt);
            unset ($_SESSION['done']);
            unset ($_SESSION['alert']);
            header("location:myaccount.php"); 
        }
        else if(!($password == $opsw)){
            $alert="Incorrect Password";
            $_SESSION['alert'] = $alert;
            unset ($_SESSION['done']);
            header("location:passwordchange.php");
        }
        else{
            $alert = "Confirm Password Doesn't Match";
            $_SESSION['alert'] = $alert;
            unset ($_SESSION['done']);
            header("location:passwordchange.php");
        }
    }
    else{
        $_SESSION['done']="done";
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
        <div class="login-box   ">
        <div class="row">
        <div class="col-md-6 login-left">
            <h2>Customer Login Here</h2>
            <form action="passwordchange.php" method="post">
                <div class="form-group">
                    <label>Previous Password</label><br>
                    <input type="text" name="email" class="form-control" required>
                </div>

                
                <div class="form-group">
                    <label>New Password</label><br>
                    <input type="password" name="psw" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label><br>
                    <input type="password" name="repsw" class="form-control" required>
                </div>

                <font color="red"><?php echo $alert; ?></font><br>

                <button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Submit</button>
                <a href="myaccount.php"><button type="button" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Cancel</button></a>
                
                <br>
            </form>
        </div>

        </div>
        </div>
    </div>

</body>
</html>
