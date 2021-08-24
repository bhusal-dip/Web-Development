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
            
        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE A_Name='$email'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        if($email== $row["A_Name"] && $password == $row["A_Pass"]){
            $id = $row["AID"];
            $_SESSION['id'] = $id;
            $admin = "admin";
            $_SESSION['admin']=$admin;
            unset ($_SESSION['error']);
            header("location:admin1.php");
        }
        else{
            $error = "*Invalid ID or Password";
            $_SESSION['error'] = $error;
            header("location:admin.php");  
        }
    }
    $conn->close();

?>