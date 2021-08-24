<?php
    session_start();

    $a = $_SESSION['count'];
    $b = $_SESSION['room'];
    $c = $_SESSION['hotel'];

    if($a>=$b){
        header ("location:done.php");
    }
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php echo $a;
            echo $b;
            echo $c;
    ?>
    <div class="container">
        <div class="login-box">
        <div class="row">
        <div class="col-md-12 login-left">
            <h1 style="text-align:center"><b>Room Registration</b></h1>
            <form action="add.php" method="post">
                <table align="center" border="1px" style="width:600px; line-height:40px;">
                    <t>
                        <th>Room No</th>
                        <th>Type</th>
                        <th>Amount</th>
                    </t>

                    <tr>
                        <td><?php $a++; echo $a; $_SESSION['count']=$a;?></td>
                        <td>
                            <div class="form-group">
                                <select class="date" name="service">
                                    <option selected hidden value="">Select Service Type
                                    </option>
                                    <option value="Single-Bed">Single-Bed
                                    </option>
                                    <option value="Double-Bed">Double-Bed
                                    </option>
                            </div>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="amount" required> 
                        </td>
                    </tr>
                </table>

                <button type="submit" class="btn btn-primary" style="background-color:blue; border-color:black; color:white">Next</button>
                <br>
            </form>
        </div>
</div>  
</body>
</html>
