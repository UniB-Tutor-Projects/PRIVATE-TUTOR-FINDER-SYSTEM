<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
<<<<<<< Updated upstream
$dbName = "private_tutor_finder_system";

$conn = mysqli_connnect($dbServerName,$dbUserName,$dbPassword,$dbName);

    if (!isset($conn)){
        echo "Connection Failed";
    }else{
        echo "Connection Successful";
    }

=======
$dbName = "private tutor finder";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

    if (!isset($conn)){
        echo "Connection Failed";
    }
>>>>>>> Stashed changes
?>