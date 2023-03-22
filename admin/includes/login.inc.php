<?php
session_start();
require(dirname(__FILE__).'/../../includes/databaseconnection.php');

if (isset($_POST['admin_login_submit'])) {
    

   $adminName =$_POST['admin_name'];
   $password = $_POST['admin_pwd'];


   if (empty($adminName) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
   }
   else {
        $sql = "SELECT * FROM admin WHERE admin_name = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt ,"s", $adminName);
            mysqli_stmt_execute($stmt);


            $result = mysqli_stmt_get_result($stmt);
            $num_rows = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
           
            if ($num_rows>0) {

                if (strcmp($row['admin_password'],$password)==0) {
                    session_regenerate_id();
                    $_SESSION['adminName'] = $row['admin_name'];
                    header("Location:../dashboard.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            } 
            else {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }  
    }
   
}
else{
    header("Location: ../login.php");
    exit();
}
