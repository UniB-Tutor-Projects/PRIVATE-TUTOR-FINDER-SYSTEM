<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "private_tutor_finder_system";

$conn = mysqli_connnect($dbServerName,$dbUserName,$dbPassword,$dbName);

    if (!isset($conn)){
        echo "Connection Failed";
    }else{
        echo "Connection Successful";
    }

?>