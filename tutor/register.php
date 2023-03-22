<?php

include('../includes/databaseconnection.php');

if (isset($_POST['submit'])) {
    $tutor_name = $_POST['tutor_name'];
    $tutor_age = $_POST['tutor_age'];
    $tutor_gender = $_POST['tutor_gender'];
    $tutor_certificate = $_POST['tutor_certificate'];
    $tutor_subject = $_POST['tutor_subject'];
    $tutor_phone = $_POST['tutor_phone'];
    $tutor_email = $_POST['tutor_email'];
    $tutor_address = $_POST['tutor_address'];
    $tutor_pwd = $_POST['tutor_pwd'];

    if (empty($tutor_name)||empty($tutor_email)||empty($tutor_pwd)||empty($tutor_address)||empty($tutor_gender)) {
		
		header("Location: register.php?msg=Empty Fields");
		exit();
	}

	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$tutor_name)) {
		header("Location: register.php?msg=Invalid Name");
		exit();
	}

	elseif (!filter_var($tutor_email, FILTER_VALIDATE_EMAIL)) {
		header("Location: register.php?msg=Invalid Email");
		exit();
	}


    else{
        $sql = "SELECT tutor_name FROM tutor where tutor_name = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "Failed: ".mysqli_error($conn);
	    }
        else{
            mysqli_stmt_bind_param($stmt, "s", $tutor_name);
		    mysqli_stmt_execute($stmt);

		    mysqli_stmt_store_result($stmt);

		    $resultCheck = mysqli_stmt_num_rows($stmt);

		    if ($resultCheck>0) {
			    header("Location: register.php?msg=Tutor Name Taken");
			    exit();
            }
        
            else{
               
                    $sql = "INSERT INTO tutor(tutor_name, age, gender, certificate, subject_tutoring,tutor_phone,tutor_email,tutor_address,tutor_pwd) VALUES(?,?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "Failed: ".mysqli_error($conn);
                    }
                    else{
                        $hashedPwd = password_hash($tutor_pwd, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt,"sssssssss",$tutor_name,$tutor_age,$tutor_gender, $tutor_certificate,$tutor_subject,$tutor_phone,$tutor_email,$tutor_address,$hashedPwd);
                        mysqli_stmt_execute($stmt);
                        session_regenerate_id();
                        $_SESSION['tutorName'] = $row['tutor_name'];
                        $_SESSION['tutorID'] = $row['tutor_id'];
                        header("Location: dashboard.php?msg=Signup Successful!");
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
        <title>Add Tutor</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
            Admin Dashboard!
        </nav>

        <div class="container">
            <div class="text-center" mb-4>
                <h3>Add New Tutor</h3>
                <p class="text-muted">Complete the below form to add a new Tutor!</p>
            </div>

            <?php

                if (isset($_GET['msg'])) {
                    if ($_GET['msg']=="Empty Fields") {
                        echo '<div class="alert alert-warning alert-dismissible fade show" rolw="alert"><strong>Empty Fields</strong>
                        
                        </div>';
                    }
                    else if ($_GET['msg']=="Invalid Name") {
                        echo '<div class="alert alert-warning alert-dismissible fade show" rolw="alert"><strong>Invalid Characters entered for Tutor Name</strong>
                        
                        </div>';
                    }
                    else if ($_GET['msg']=="Invalid Email") {
                        echo '<div class="alert alert-warning alert-dismissible fade show" rolw="alert"><strong>Invalid Email Characters</strong>
                        
                        </div>';
                    }
                    else if ($_GET['msg']=="Tutor Name Taken") {
                        echo '<div class="alert alert-warning alert-dismissible fade show" rolw="alert"><strong>Tutor Name Taken!</strong>
                        
                        </div>';
                    }
                }
            ?>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width: 50vw; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Name:</label>
                            <input type="text" class="form-control" name="tutor_name" placeholder="Tutor Name">
                        </div>
                        <div class="col">
                            <label class ="form-label">Tutor Age:</label>
                            <input type="text" class="form-control" name="tutor_age" placeholder="Age">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Cetificate:</label>
                            <input type="text" class="form-control" name="tutor_certificate" placeholder="Highest Certificate">
                        </div>
                        <div class="col">
                            <label class ="form-label">Subject Tutoring:</label>
                            <input type="text" class="form-control" name="tutor_subject" placeholder="Tutor Subject">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Email:</label>
                            <input type="text" class="form-control" name="tutor_email" placeholder="Tutor Email">
                        </div>
                        <div class="col">
                            <label class ="form-label">Tutor Address:</label>
                            <input type="text" class="form-control" name="tutor_address" placeholder="Tutor Address">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="tutor_phone" placeholder="Phone Number">
                        </div>
                        <div class="col">
                            <label class ="form-label">Tutor Password:</label>
                            <input type="password" class="form-control" name="tutor_pwd" placeholder="Tutor Password">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Gender</label>&nbsp;
                        <input type="radio" class="form-check-input" name="tutor_gender" id="male" value="male">
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="tutor_gender" id="female" value="female">
                        <label for="female" class="form-input-label">Female</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">SignUp</button>
                        <a href="dashboard.php?msg=No Tutor Added!" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    </body>
</html>