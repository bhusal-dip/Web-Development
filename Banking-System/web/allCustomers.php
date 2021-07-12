<?php include "./php/init.php" ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- styles -->
    <link rel="stylesheet" href="./assets/css/main.css">

</head>
<body>

<?php include "./header.html" ?>

    
    <main>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 

                        $query ="SELECT * FROM customers";
                        $res = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($res)){
                    ?>

                    <tr>
                        <td><?php echo $row["account_number"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><a href="./viewCustomer.php?number=<?php echo $row["account_number"] ?>" class="plain-btn">View Profile</a><br><br>
                            <a href="./transactionhistory.php?number=<?php echo $row["account_number"] ?>" class="plain-btn">Transaction Summary</a></td>
                    </tr>
                            <?php
                            }
                            ?>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>