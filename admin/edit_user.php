<?php

include('../includes/databaseconnection.php');
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_age = $_POST['user_age'];
    $user_gender = $_POST['user_gender'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_pwd = $_POST['user_pwd'];

    if (empty($user_name)||empty($user_email)||empty($user_address)||empty($user_gender)) {
		
		header("Location: dashboard.php?msg=Empty Fields");
		exit();
	}

	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		header("Location: dashboard.php?msg=Invalid Entries");
		exit();
	}

	elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
		header("Location: dashboard.php?msg=Invalid Email");
		exit();
	}

	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$user_name)) {
		header("Location: dashboard.php?msg=Invalid Username");
		exit();
	}

    else{
        
        $sql = "UPDATE `users` SET `user_name`='$user_name',`age`='$user_age',`gender`='$user_gender',`phone_number`='$user_phone',`email`='$user_email',`address`='$user_address' WHERE user_id = $id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: dashboard.php?msg=User Data Updated successfully!");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Edit User</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
            Admin Dashboard!
        </nav>

        <div class="container">
            <div class="text-center" mb-4>
                <h3>Edit User Information</h3>
                <p class="text-muted">Click Update After Changing Any Information!</p>
            </div>

            <?php
               
                $sql = "SELECT * FROM users WHERE user_id = $id LIMIT 1";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);

            ?>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width: 50vw; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">User Name:</label>
                            <input type="text" class="form-control" name="user_name" value="<?php echo $row['user_name']?>">
                        </div>
                        <div class="col">
                            <label class ="form-label">User Age:</label>
                            <input type="text" class="form-control" name="user_age" value="<?php echo $row['age']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">User Email:</label>
                            <input type="text" class="form-control" name="user_email" value="<?php echo $row['email']?>">
                        </div>
                        <div class="col">
                            <label class ="form-label">User Address:</label>
                            <input type="text" class="form-control" name="user_address" value="<?php echo $row['address']?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="user_phone" value="<?php echo $row['phone_number']?>">
                        </div>
                        
                    </div>

                    <div class="form-group mb-3">
                        <label>Gender</label>&nbsp;
                        <input type="radio" class="form-check-input" name="user_gender" id="male" value="male" <?php echo ($row['gender']=='male')?"checked":""; ?>>
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="user_gender" id="female" value="female" <?php echo ($row['gender']=='female')?"checked":""; ?>>
                        <label for="female" class="form-input-label">Female</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="dashboard.php?msg=No Changes Made to User <?php echo $row['user_name'] ?>'s Records!" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    </body>
</html>