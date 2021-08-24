<?php
    session_start();

    if(!(isset($_SESSION['id']))){
        header("location: reception1.php");
    }
    else{
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "Hotel";
    
        $alert = "";
        $bookid = $_POST['bookid'];

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);



        $count=count($bookid);

        for($i=0; $i<$count; $i++){
            $x = $bookid[$i];
            
            $rate = mysqli_query($conn, "SELECT * FROM booking WHERE B_ID='$x'");
            $result = mysqli_fetch_array($rate, MYSQLI_ASSOC);
    
            $cid = $result["C_ID"];
            $hid = $result["H_ID"];
            $rno = $result["R_NO"];

            $update = mysqli_query($conn, "UPDATE booking SET Status='Paid' WHERE B_ID='$x'");

            $update = mysqli_query($conn, "UPDATE room SET Availability='YES' WHERE H_ID='$hid' AND R_NO='$rno'");
        }
        header ("location: reception1.php");
    }
?>

