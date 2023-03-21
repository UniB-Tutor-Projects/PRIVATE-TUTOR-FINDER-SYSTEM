<?php
require(dirname(__FILE__).'/../../includes/databaseconnection.php');

if (isset($_POST['admin_login_submit'])) {
    

   $adminName = mysqli_real_escape_string($conn, $_POST['admin_name']);
   $password = mysqli_real_escape_string($conn, $_POST['admin_pwd']);


   if (empty($adminName) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
   }
   else {
        $sql = "SELECT * FROM admin WHERE admin_name = '$adminName' AND admin_password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['admin_name']==$adminName && $row['admin_password']==$password) {
                $_SESSION['adminName'] = $row['admin_name'];
                header("Location: ../dashboard.php?error=noerror");
                exit();
            }
        }   
    }
   
}
else{
    header("Location: ../login.php");
    exit();
}
