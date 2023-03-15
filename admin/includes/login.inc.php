<?php

if (isset($_POST['admin_login_submit'])) {
   require "..includes/databaseconnection.php";

   $adminName = $_POST['admin_name'];
   $password = $_POST['admin_pwd'];

   if (empty($adminName) || empty($password)) {
    header("Location ../login.php?error=emptyfields");
    exit();
   }
   else{
    $sql = "SELECT FROM admin WHERE admin_name = ? AND admin_password = ?; ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Loaction: ../login.php?error=sqlerror");
        exit();
    }
    else {
        
        mysqli_stmt_bind_param($stmt ,"ss", $adminName, $password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = $mysqli_fetch_assoc($result)) {
            # code...
            $pwdCheck = password_verify($password, $row['admin_password']);

            if ($pwdCheck==false) {
                header("Locaton: ../Login.php?erro=wrongpwd");
                exit();
            }
            else if ($pwdCheck == true) {
                session_start();
                $_SESSION['adminName'] = $row['admin_name'];
                $_SESSION['adminPwd'] = $row['admin_password'];
                header("Location: ..dashboard.php?login=success");
                exit();
            }
            else{
                header("Loaction: ..login.php?error=wrongpwd")
            }
        }
        else{
            header("Loaction: ..login.php?error=nouser");
            exit();
        }
    }
   }
}
else{
    header("Location: ..login.php");
    exit();
}