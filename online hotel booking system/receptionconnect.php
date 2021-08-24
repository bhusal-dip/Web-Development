<?php

    session_start();

    $error = "";
    if(isset($_SESSION['id'])){
        header("location:admin.php");
    }
    else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $conn = mysqli_connect("localhost", "root", "", "hotel");
            
        $sql = mysqli_query($conn, "SELECT * FROM reception WHERE R_ID='$email'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        if($email== $row["R_ID"] && $password == $row["R_Pass"]){
            $_SESSION['id']=$row["R_ID"];
            $error = "";
            $reception = "reception";
            $_SESSION['reception']=$reception;
            $_SESSION['error'] = $error;
            header("location:reception1.php");
        }
        else{
            $error = "*Invalid ID or Password";
            $_SESSION['error'] = $error;
            header("location:admin.php");  
        }
    }
    $conn->close();

?>