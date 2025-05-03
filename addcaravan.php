<?php
session_start();

    include("connectregister.php");
    include("check_login.php");

    $user_data = check_login($con);

    if(isset($_POST['submit'])) {
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Caravan</title>
</head>
<body>
    <div class="navbar">
        <a href="userhomepage.php">Home</a>
        <div class="dropdown">
            <a class="dropbtn">List Your Caravan</a>
            <div class="dropdown-content">
            <a href="addcaravan.php">Add Caravan</a>
            <a href="deletecaravan.php">Delete Caravan</a>
            </div>
        </div>
        <a href="caravansummary.php">Browse Caravans</a>
        <a href="logout.php">Logout</a>
    </div>
    <div id="add-caravan" class="container" style="display: none; background: teal;">
        <h1>Add Your Caravan</h1>
        <div class="form-container">
            <form id="add-caravan-form" onsubmit="return addCaravan()">
                <input type="text" id="caravan-name" placeholder="Caravan Name" required>
                <select id="caravan-type" required>
                    <option value="" disabled selected>Select Caravan Type</option>
                    <option value="Luxury">Luxury</option>
                    <option value="Compact">Compact</option>
                    <option value="Classic">Classic</option>
                </select>
                <input type="url" id="caravan-image" placeholder="Caravan Image URL" required>
                <textarea id="caravan-description" placeholder="Caravan Description" rows="4" required></textarea>
                <button type="submit">Add Caravan</button>
                <p id="add-caravan-error" class="error"></p>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>