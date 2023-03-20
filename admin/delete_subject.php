<?php

include('../includes/databaseconnection.php');
$id = $_GET['id'];
$sql = "DELETE FROM subject WHERE subject_id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: dashboard.php?msg=Subject Record Deleted Successfully");
}
else{
    echo "Failed: ".mysqli_error($conn);
}

?>