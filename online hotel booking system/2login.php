<?php
    session_start();
    $error = "";
    
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
    }
    if(isset($_SESSION['id'])){
        header("location: customer1.php");
    }
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<br>
<CENTER><h1><font color="White"> LOG IN </font></H1></CENTER>
<hr color="#ffffff" SIZE="10"WIDTH="100%">

<BODY text="yellow" link="#ffffff" alink="#ffffff" vlink="#ffffff">

	<h3>
    <p align="right"><a href="home.php"><u>Home</u></a> | <a href="2login.php"><u>LogIn</u></a> | <a href="admin.php"><u>Admin LogIn</u>&nbsp&nbsp&nbsp</a></p>

		<hr color="white" SIZE="1" WIDTH="100%">
	</h3>
    <hr color="white" SIZE="1" WIDTH="100%">
    <div class="container">
        <div class="login-box">
        <div class="row">
        <div class="col-md-6 login-left">
            <h2>Customer Login Here</h2>
            <form action="2connect.php" method="post">
                <div class="form-group">
                    <label>Email</label><br>
                    <input type="text" name="email" class="form-control" required>
                </div>

                
                <div class="form-group">
                    <label>Password</label><br>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <font color="red"><?php echo $error; ?></font><br>

                <button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Login</button>
                <button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white" onclick="window.location.href='1REGISTER.php'">Sign Up</button>
                <div class="container">
                    <span class="psw" textcolor="black"><a href="#"><font color="black">Forgot password?</font></a></span>
                </div>
                <br>
            </form>
        </div>

        </div>
        </div>
    </div>

</body>
</html>
