<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "private tutor finder";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

    if (!isset($conn)){
        echo "Connection Failed";
    }
?>