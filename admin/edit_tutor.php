<?php

include('../includes/databaseconnection.php');
$id = $_GET['id'];

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

    if (empty($tutor_name)||empty($tutor_email)||empty($tutor_address)||empty($tutor_gender)) {
		
		header("Location: dashboard.php?msg=Empty Fields");
		exit();
	}

	elseif (!filter_var($tutor_email, FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$tutor_name)) {
		header("Location: dashboard.php?msg=Invalid Entries");
		exit();
	}

	elseif (!filter_var($tutor_email, FILTER_VALIDATE_EMAIL)) {
		header("Location: dashboard.php?msg=Invalid Email");
		exit();
	}

	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$tutor_name)) {
		header("Location: dashboard.php?msg=Invalid Tutor Name");
		exit();
	}

    else{
        
        $sql = "UPDATE `tutor` SET `tutor_name`='$tutor_name',`age`='$tutor_age',`gender`='$tutor_gender',`certificate`='$tutor_certificate',`subject_tutoring`='$tutor_subject',`tutor_phone`='$tutor_phone',`tutor_email`='$tutor_email',`tutor_address`='$tutor_address' WHERE tutor_id=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: dashboard.php?msg=Tutor Data Updated successfully!");
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
        <title>Edit Tutor</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
            Admin Dashboard!
        </nav>

        <div class="container">
            <div class="text-center" mb-4>
                <h3>Edit Tutor Information</h3>
                <p class="text-muted">Click Update after updating any information!</p>

                <?php
               
                    $sql = "SELECT * FROM tutor WHERE tutor_id = $id LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);

                ?>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width: 50vw; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Name:</label>
                            <input type="text" class="form-control" name="tutor_name" value="<?php echo $row['tutor_name']?>">
                        </div>
                        <div class="col">
                            <label class ="form-label">Tutor Age:</label>
                            <input type="text" class="form-control" name="tutor_age" value="<?php echo $row['age']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Cetificate:</label>
                            <input type="text" class="form-control" name="tutor_certificate" value="<?php echo $row['certificate']?>">
                        </div>
                        <div class="col">
                            <label class ="form-label">Subject Tutoring:</label>
                            <input type="text" class="form-control" name="tutor_subject" value="<?php echo $row['subject_tutoring']?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Email:</label>
                            <input type="text" class="form-control" name="tutor_email" value="<?php echo $row['tutor_email']?>">
                        </div>
                        <div class="col">
                            <label class ="form-label">Tutor Address:</label>
                            <input type="text" class="form-control" name="tutor_address" value="<?php echo $row['tutor_address']?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="tutor_phone" value="<?php echo $row['tutor_phone']?>">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Gender</label>&nbsp;
                        <input type="radio" class="form-check-input" name="tutor_gender" id="male" value="male" <?php echo ($row['gender']=='male')?"checked":""; ?>>
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="tutor_gender" id="female" value="female" <?php echo ($row['gender']=='female')?"checked":""; ?>>
                        <label for="female" class="form-input-label">Female</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="dashboard.php?msg=No changes made to Tutor <?php echo $row['tutor_name']?>'s Records!" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    </body>
</html>