<?php

require(dirname(__FILE__).'/../../includes/databaseconnection.php');

function display_data($tableName){
    global $conn;
    $sql = "SELECT * FROM ".$tableName;
    $result = mysqli_query($conn,$sql);

    return $result;
}

function no_data($tableName){
    global $conn;
    $sql = "SELECT count(*) as total from ".$tableName;
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);

    return $result['total'];
}

