<?php
    session_start();
    unset ($_SESSION['hotel']);
    unset ($_SESSION['room']);
    unset ($_SESSION['count']);
?>


<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<br>
<CENTER><h1><font color="White"> ADMIN </font></H1></CENTER>
<hr color="#ffffff" SIZE="10"WIDTH="100%">

<BODY text="yellow" link="#ffffff" alink="#ffffff" vlink="#ffffff">

	<h3>
    <p align="right"><a href="hotel.php"><u>Hotels</u></a> | <a href="addhotel.php"><u>Add Hotels</u></a> | <a href="addreception.php"><u>Add Reception</u> | <a href="logout.php"><u>LogOut</u></a>&nbsp&nbsp&nbsp</a></p>
		<FONT COLOR="White" size="5" align="justify">
		<hr color="white" SIZE="1" WIDTH="100%">
	</h3>
    <hr color="white" SIZE="1" WIDTH="100%">

    <font color='red', align="center"><h1>DONE</h1></font>
</body>
</html>
