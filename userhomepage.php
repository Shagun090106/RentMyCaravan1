<?php
session_start();

    include("connectregister.php");
    include("check_login.php");

    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Home Page</title>
</head>
<body>
    <div class="navbar">
        <a href="homepage.html">Home</a>
        <a href="aboutus.html">About</a>
        <a href="servicespage.html">Services</a>
        <a href="logout.php">Logout</a>
    </div>

    <div id="user home" class="container active" style="background: teal;">
    <h1>Welcome back, <?php echo $user_data['username']; ?>!</h1>
    
    <a href="addcaravan.html" class="button">List Your Caravan<br><br></a>
    <a href="caravansummary.html" class="button">Browse Caravans</a>

    <script src="script.js"></script>
</body>
</html>