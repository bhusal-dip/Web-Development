<?php  
    include "./php/init.php";
    if(isset($_GET["number"])){
        $accno = intval($_GET["number"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>

<?php include "./header.html" ?>

	<div class="container">
        <h2 class="text-center pt-4">Transaction History</h2>
        <h3 class="text-center pt-4"><?php
                                            $res = mysqli_query($con, "SELECT * FROM customers WHERE account_number = $accno");
                                            $rows = mysqli_fetch_assoc($res);
                                            echo $rows["name"];
                                        ?>
        </h2>
        
       <br>
       <div class="table-responsive-sm">

    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">Transaction Type</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
                <th class="text-center">Remark</th>
            </tr>
        </thead>
        <tbody>
        <?php


            $sql = "SELECT * FROM transactions WHERE from_account_no = $accno OR to_account_no = $accno";

            $query =mysqli_query($con, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2"><?php 
                                    if($rows['from_account_no']==$accno){
                                        echo "Sent";
                                    }
                                    else{
                                        echo "Received";
                                    }
                                    ?></td>
            <td class="py-2"><?php echo $rows['amount_sent']; ?> </td>
            <td class="py-2"><?php echo $rows['date_time']; ?> </td>
            <td class="py-2"><?php echo $rows['message']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
</body>
</html>


<?php
        
    }

?>