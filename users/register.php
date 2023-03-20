<?php
include_once('../includes/databaseconnection.php');
session_start();

//collecting data from the forms
if(isset($_POST['userregister_submit'])){
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_address = $_POST['address'];
    $user_gender = $_POST['gender'];
    $user_age = $_POST['age'];
    $user_phonenumber = $_POST['phonenumber'];
    $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if(empty($user_name) || empty($user_email)|| empty($user_address)|| empty( $user_gender) ||empty( $user_age) || empty( $user_phonenumber)){
        header("Location: ../forms/form.php?message=All fields cannot be empty");
        exit();
    }
   elseif(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../forms/form.php?message=Invalid email");
        exit();
   }
   elseif(!preg_match("/^[a-zA-Z0-9]*$/", $user_name )){
        header("Location: ../forms/form.php?message=Invalid username");
        exit();
   }

    
    //query to chceck users
    $checkusers = "SELECT * FROM users WHERE  $user_email ='email'";
    $run = mysqli_query($conn, $checkusers);
    $result = mysqli_num_rows($run);

        if($result>0){
            echo "user already exist. Try another username.";
            exit();
        }

    //insert new user
    $insertuser = "INSERT INTO users (name,email,address,gender,age,phone_number,password) VALUES('$user_name',' $user_email',' $user_address','$user_gender',' $user_age',' $user_phonenumber',' $user_password')";
    $run = mysqli_query($conn,$insertuser);

         if($run>0){
            header("Location: ../users/dashboard.php");
         }
         else{
            echo "Error!! Query didn't run well.";
         }
  
}
?>


