<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="./assets/css/main.css">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url("./images/1.jpg");

            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>
<body>

    <?php include "./header.html" ?>
    

    <div class="bg">
        
        <h1 class="text-center pt-4" style="color: red;">Internship Banking System</h1>
        <br><br><br><br>
        <h3 style="color: white;"><p>
        The aim of this project is to create a simple banking portal for automatic fund transfer. 
            The system allow to check for his users details and then, simply transfer the fund to the receiver. 
            The system could store bank data and provide an interface for retrieving customer related details with 100% accuracy. 
            Through the application we can view the details of the customers and we can transfer fund from one account to the another
            account.
    </p>
        </h3>

    </div>

</body>
</html>