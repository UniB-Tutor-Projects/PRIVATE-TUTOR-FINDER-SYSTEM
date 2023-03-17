<?php

if (isset($_POST['tutor_login_submit'])) {
    require(dirname(__FILE__).'/../../includes/databaseconnection.php');

   $tutorName = $_POST['tutor_name'];
   $password = $_POST['tutor_pwd'];

   if (empty($tutorName) || empty($password)) {
    header("Location ../tutor.php?error=emptyfields");
    exit();
   }
   else{
    $sql = "SELECT * FROM tutor WHERE tutor_name = ? AND tutor_pwd = ?; ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../tutor.php?error=sqlerror");
        exit();
    }
    else {
        
        mysqli_stmt_bind_param($stmt ,"ss", $tutorName, $password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($password, $row['tutor_pwd']);

            if ($pwdCheck==false) {
                header("Location: ../tutor.php?erro=wrongpwd");
                exit();
            }
            else if ($pwdCheck == true) {
                session_start();
                $_SESSION['tutorName'] = $row['tutor_name'];
                $_SESSION["logged"] = true;
                $_SESSION['tutorPwd'] = $row['tutor_pwd'];
                header("Location: ../dashboard.php?login=success");
                exit();
            }
            else{
                header("Location: ../tutor.php?error=wrongpwd");
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
