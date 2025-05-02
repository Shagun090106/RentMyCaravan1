<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //Database connection

    $register = new mysqli('localhost', 'root', '', 'rentmycaravan');
    if($register->connect_error){
        die('Connection Failed : '.$register->connect_error);
    }else{
        $stmt = $register->prepare("insert into registration(firstName, lastName, username, password, confirmPassword) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $username, $password, $confirmPassword);
        $stmt->execute();
        echo "registration successful...";
        $stmt->close();
        $register->close();
    }
?>