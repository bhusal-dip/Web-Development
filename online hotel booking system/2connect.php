<?php
    session_start();

    $error="";
    if(isset($_SESSION['id'])){
        header("location:customer1.php");
    }
    else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $conn = mysqli_connect("localhost", "root", "", "hotel");
            
        $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_Email='$email'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        if($email== $row["C_Email"] && $password == $row["C_Pass"]){
            $id = $row["C_ID"];
            $_SESSION['id'] = $id;
            unset ($_SESSION['error']);
            header("location:customer1.php");
        }
        else{
            $error = "*Invalid Email or Password";
            $_SESSION['error']=$error;
            header("location:2login.php");  
        }
    }
    $conn->close();

?>