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
<body>

    <div class="container">
        <div class="login-box">
        <div class="row">
        <div class="col-md-7 login-left">
            <h1 style="text-align:center"><b>Registration</b></h1>
            <form action="1CONNECT.PHP" method="post">
                <div class="form-group">
                    <label for="name"><b><font size="5">Username</font></b></label><br>
                    <input type="text" class="form-control" placeholder="Enter Name" id='name' name="name" required>
                </div>

                <div class="form-group">
                    <label for="address"><b><font size="5">Address</font></b></label><br>
                    <input type="text" class="form-control" placeholder="Enter Address" name="address" required> 
                </div>

                <div class="form-group">
                    <label for="email"><b><font size="5">Email</font></b>
                    </label><br>
                    <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" required>  
                </div>

                <div class="form-group">
                    <label><b><font size="5">Date Of Birth</font></b>
                    </label><br>
                    <select class="date" name="day">
                                    <option selected hidden value="">Select Day
                                    </option>
                                    <option value="1">01
                                    </option>
                                    <option value="2">02
                                    </option>
                                    <option value="3">03
                                    </option>
                                    <option value="4">04
                                    </option>
                                    <option value="5">05
                                    </option>
                                    <option value="6">06
                                    </option>
                                    <option value="7">07
                                    </option>
                                    <option value="8">08
                                    </option>
                                    <option value="9">09
                                    </option>
                                    <option value="10">10
                                    </option>
                                    <option value="11">11
                                    </option>
                                    <option value="12">12
                                    </option>
                                    <option value="13">13
                                    </option>
                                    <option value="14">14
                                    </option>
                                    <option value="15">15
                                    </option>
                                    <option value="16">16
                                    </option>
                                    <option value="17">17
                                    </option>
                                    <option value="18">18
                                    </option>
                                    <option value="19">19
                                    </option>
                                    <option value="20">20
                                    </option>
                                    <option value="21">21
                                    </option>
                                    <option value="22">22
                                    </option>
                                    <option value="23">23
                                    </option>
                                    <option value="24">24
                                    </option>
                                    <option value="25">25
                                    </option>
                                    <option value="26">26
                                    </option>
                                    <option value="27">27
                                    </option>
                                    <option value="28">28
                                    </option>
                                    <option value="29">29
                                    </option>
                                    <option value="30">30
                                    </option>
                                    <option value="31">31
                                    </option>
                    </select>
                    <select name="month">
                                    <option selected hidden value="">Select Month
                                    </option>
                                    <option value="JAN">January
                                    </option>
                                    <option value="FEB">February
                                    </option>
                                    <option value="MAR">March
                                    </option>
                                    <option value="APR">April
                                    </option>
                                    <option value="MAY">May
                                    </option>
                                    <option value="JUN">June
                                    </option>
                                    <option value="JUL">July
                                    </option>
                                    <option value="AUG">August
                                    </option>
                                    <option value="SEP">September
                                    </option>
                                    <option value="OCT">October
                                    </option>
                                    <option value="NOV">November
                                    </option>
                                    <option value="DEC">December
                                    </option>
                    </select>
                    <select name="year">
                                    <option selected hidden value="">Select Year
                                    </option>
                                    <option value="1990">1990</option>	
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                    </select>
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
                <a href="2login.php"><button type="button" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Cancel</button></a>
                </div>
                <br>
            </form>
        </div>
</div>
</body>
</html>
