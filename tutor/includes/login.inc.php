<?php

session_start();
require(dirname(__FILE__).'/../../includes/databaseconnection.php');


if (isset($_POST['tutor_login_submit'])) {

   $tutorName = $_POST['tutor_name'];
   $password = $_POST['tutor_pwd'];

   if (empty($tutorName) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
   }
   else{
        $sql = "SELECT * FROM tutor WHERE tutor_name = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else {
            
            mysqli_stmt_bind_param($stmt ,"s", $tutorName);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $num_rows = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            if ($num_rows>0) {
                $pwdCheck = password_verify($password, $row['tutor_pwd']);
                if ($pwdCheck) {
                    session_regenerate_id();
                    $_SESSION['tutorName'] = $row['tutor_name'];
                    $_SESSION['tutorID'] = $row['tutor_id'];
                    $_SESSION['tutorPwd'] = $row['tutor_pwd'];
                    header("Location:../dashboard.php?login=success");
                    exit();
                }
                else{
                    header("Location:../login.php?error=wrongpwd");
                }
            }
            else{
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
