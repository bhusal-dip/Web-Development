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
    
        $bookid = $_POST['bookid'];

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        $id = $_SESSION['id'];
        $sql = mysqli_query($conn, "SELECT * FROM customer WHERE C_ID='$id'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

        $name = $row["C_Name"];
        $email = $row["C_Email"];
        $password = $row["C_Pass"];
        $hid= $_SESSION['hid'];




        if($bookid!=NULL){
       
            $alert = "Booking was Successful";
            $count=count($bookid);
            for($i=0; $i<$count; $i++){
                $x = $bookid[$i];
            
                $rate = mysqli_query($conn, "SELECT * FROM booking WHERE B_ID='$x'");
                $result = mysqli_fetch_array($rate, MYSQLI_ASSOC);
        
                $cid = $result["C_ID"];
                $hid = $result["H_ID"];
                $rno = $result["R_NO"];
    
                $update = mysqli_query($conn, "DELETE FROM booking WHERE B_ID='$x'");
    
                $update = mysqli_query($conn, "UPDATE room SET Availability='YES' WHERE H_ID='$hid' AND R_NO='$rno'");
            }
        }
        header("location:customer1.php");
    }
?>
