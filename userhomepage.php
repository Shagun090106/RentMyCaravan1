<?php
session_start();

    include("");

    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>About Us - Rent My Caravan</title>
</head>
<body>

    <div class="navbar">
        <a href="homepage.html">Home</a>
        <a href="aboutus.html">About</a>
        <a href="servicespage.html">Services</a>
        <a href="loginpage.html">Login</a>
    </div>

    <script src="script.js"></script>
