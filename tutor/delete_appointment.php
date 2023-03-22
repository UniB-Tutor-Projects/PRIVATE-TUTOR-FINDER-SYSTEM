<?php

include('../includes/databaseconnection.php');
$id = $_GET['id'];
$sql = "DELETE FROM appointment WHERE appointment_id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: dashboard.php?msg=Appointment Record Deleted Successfully");
}
else{
    echo "Failed: ".mysqli_error($conn);
}

?>