
<?php
/* session_start();
    include("connectregister.php");

    if($_SERVER['REQUEST_METHOS'] == "POST")
    {
        //something was posted
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if(!empty($lastName) && !empty($username) && !empty($password) && !empty($confirmPassword) !is_numeric($username))
        {
            //save to database
            $query = "insert into users (firstName, lastName, username, password, confirmPassword) values ('$firstName', '$lastName', '$username', '$password', '$confirmPassword')";

            my sqli_query($con: $query);

            header("Location: loginform.php");
            die;
        }else
        {
            echo "Please enter vailid information!";
        }
    }

/*    $firstName = $_POST['firstName'];
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

/*DIDNT WORK SO TESTING ANOTHER WAY, THATS WHY THIS IS COMMENTED FOR NOW INCASE I NEED IT:)