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
    
        $name = $_POST['name'];

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        $id = $_SESSION['id'];
        $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_ID='$id'");

        $check = mysqli_query($conn, "SELECT * FROM hotel WHERE H_Name='$name'");
        $data = mysqli_fetch_array($check, MYSQLI_ASSOC);
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $name = $row["C_Name"];
        $email = $row["C_Email"];
        $password = $row["C_Pass"];
        $hid = $data["H_ID"];
        $_SESSION["hid"]=$hid;
        $x= 1;
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
            Welcome, <?php echo $name; ?>... </font>
    </h3>
        <hr color="white" SIZE="1" WIDTH="100%">
        <FONT COLOR="White" size="5" align="center">    
        
        <form action="alert.php" method="POST">

           <table align="center" border="2px" style="width:1200px; line-height:30px;">
                    <tr>
                        <th>Hotel Name</th>
                        <th>Room No</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Availability</th>
                        <th>Click To Book</th>
                    </tr>
                <?php
                    $a = mysqli_query($conn, "SELECT H.H_Name, R.* FROM HOTEL H, room R WHERE H.H_ID=R.H_ID AND R.H_ID='$hid'");
                    while($row = mysqli_fetch_array($a, MYSQLI_ASSOC))
                    {
                ?>
                    <tr>
                        <td><?php echo $row['H_Name']; ?></td>
                        <td><?php echo $row['R_NO']; ?></td>
                        <td><?php echo $row['R_Type']; ?></td>
                        <td><?php echo $row['R_Amount']; ?></td>
                        <td><?php echo $row['Availability']; ?></td>
                        <td>
                            <?php if($row['Availability']=="NO"){
                                        echo "";
                                    }   
                                    else{
                                        ?>    
                                        <input type="checkbox" name="roomno[]" value="<?php echo $row["R_NO"];?>">
                                    <?php
                                    }
                                    ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>

                </table>
                <p align="center"><button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Book</button></p>
                <br>
            </form>
        </div>
</div>  


	<hr color="white" SIZE="1" WIDTH="100%">

</BODY>
</HTML>