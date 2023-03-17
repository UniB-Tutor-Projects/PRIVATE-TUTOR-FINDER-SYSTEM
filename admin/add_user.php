<?php

include('../includes/databaseconnection.php');

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_age = $_POST['user_age'];
    $user_gender = $_POST['user_gender'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_pwd = $_POST['user_pwd'];

    if (empty($user_name)||empty($user_email)||empty($user_pwd)||empty($user_address)||empty($user_gender)) {
		
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
        $sql = "SELECT user_name FROM users where user_name = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "Failed: ".mysqli_error($conn);
	    }
        else{
            mysqli_stmt_bind_param($stmt, "s", $user_name);
		    mysqli_stmt_execute($stmt);

		    mysqli_stmt_store_result($stmt);

		    $resultCheck = mysqli_stmt_num_rows($stmt);

		    if ($resultCheck>0) {
			    header("Location: dashboard.php?msg=User Name Taken");
			    exit();
            }
        
            else{
                $sql = "INSERT INTO users(user_name, age, gender, phone_number,email,address,user_pwd) VALUES(?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "Failed: ".mysqli_error($conn);
                }
                else{
                    $hashedPwd = password_hash($user_pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sssssss",$user_name,$user_age,$user_gender,$user_phone,$user_email,$user_address,$hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: dashboard.php?msg=New record created successfully!");
                    exit();
                }
            }
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
        <title>Add User</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
            Admin Dashboard!
        </nav>

        <div class="container">
            <div class="text-center" mb-4>
                <h3>Add New User</h3>
                <p>Complete the below form to add a new User!</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width: 50vw; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">User Name:</label>
                            <input type="text" class="form-control" name="user_name" placeholder="User Name">
                        </div>
                        <div class="col">
                            <label class ="form-label">User Age:</label>
                            <input type="text" class="form-control" name="user_age" placeholder="Age">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">User Email:</label>
                            <input type="text" class="form-control" name="user_email" placeholder="User Email">
                        </div>
                        <div class="col">
                            <label class ="form-label">User Address:</label>
                            <input type="text" class="form-control" name="user_address" placeholder="User Address">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="user_phone" placeholder="Phone Number">
                        </div>
                        <div class="col">
                            <label class ="form-label">User Password:</label>
                            <input type="password" class="form-control" name="user_pwd" placeholder="User Password">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Gender</label>&nbsp;
                        <input type="radio" class="form-check-input" name="user_gender" id="male" value="male">
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="user_gender" id="female" value="female">
                        <label for="female" class="form-input-label">Female</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="dashboard.php?msg=No User Added!" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    </body>
</html>