<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "rentmycaravan";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("failed to connect!");
}

?>