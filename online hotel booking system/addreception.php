<?php
    session_start();
    $error = "";
    
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
    }
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="login-box">
        <div class="row">
        <div class="col-md-7 login-left">
            <h1 style="text-align:center"><b>Registration</b></h1>
            <form action="addreceptionconnect.php" method="post">
                <div class="form-group">
                    <label for="id"><b><font size="5">Reception ID</font></b></label><br>
                    <input type="text" class="form-control" placeholder="Enter Hotel ID" id='id' name="id" required>
                </div>
                <div class="form-group">
                    <label for="name"><b><font size="5">Reception Name</font></b></label><br>
                    <input type="text" class="form-control" placeholder="Enter Hotel Name" id='name' name="name" required>
                </div>

                <div class="form-group">
                    <label for="address"><b><font size="5">Address</font></b></label><br>
                    <input type="text" class="form-control" placeholder="Enter Address" name="address" required> 
                </div>
                
                <div class="form-group">
                    <label for="phno"><b><font size="5">Contact No</font></b>
                    </label><br>
                    <input type="text" class="form-control" placeholder="Enter Contact No" id="phno" name="phone" required>        
                </div>

                <div class="form-group">
                    <label for="psw"><b><font size="5">Password</font></b>
                    </label><br>
                    <input type="password" class="form-control" placeholder="Enter Password" id="psw" name="psw" required>               
                </div>

                <div class="form-group">
                    <label for="repsw"><b><font size="5">Confirm Password</font></b>
                    </label><br>
                    <input type="password" class="form-control" placeholder="Re-Enter Password" id="repsw" name="repsw" required>                   
                </div>

                <font color="red"><?php echo $error; ?></font><br>

                <button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Submit</button>
                <a href="admin1.php"><button type="button" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Cancel</button></a>
                </div>
                <br>
            </form>
        </div>
</div>
</body>
</html>
