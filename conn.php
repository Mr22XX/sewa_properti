<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "sewa_properti";

$conn = mysqli_connect($host, $username, $password, $db);

if(!$conn){
    die("ERROR : " . mysqli_connect_error());
}

?>