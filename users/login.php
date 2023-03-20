<?php
 include_once('../includes/databaseconnection.php');
 session_start();

 
 //collecting data from the forms
if(isset($_POST['userlogin_submit'])){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    
    //query to chceck users
    $checkusers = "SELECT * FROM users WHERE  $user_email ='email'";
    $run = mysqli_query($conn, $checkusers);
    $result = mysqli_num_rows($run);

    if( $result >0){
        while($row = mysqli_fetch_assoc()){
            //verify password
            if(password_verify($password, $row['password'])){
                $email = $row['email'];
                $_SESSION ['name']=$row['user_name'];
                header("Location:.../users/dashboard.php");
            }
            else{
                header("Location: ../forms/form.php?message=Invald emal");
            }
        }
    }
  
}
?>