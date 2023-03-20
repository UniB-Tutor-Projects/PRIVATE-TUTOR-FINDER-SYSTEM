<?php

include('../includes/databaseconnection.php');

if (isset($_POST['submit'])) {
    $subject_id = $_POST['subject_id'];
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $tutor_id = $_POST['tutor_id'];

    if (empty($subject_name)||empty($subject_code)||empty($tutor_id)) {
		
		header("Location: dashboard.php?msg=Empty Fields");
		exit();
	}

    else{
       
                $sql = "INSERT INTO subject(subject_name, subject_code, tutor_id) VALUES(?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "Failed: ".mysqli_error($conn);
                }
                else{
                    $sqlCheckTutor = "SELECT * FROM tutor WHERE tutor_id='$tutor_id'";
                    $value = mysqli_query($conn, $sqlCheckTutor);

                    $count = mysqli_num_rows($value);
                    if ($count==1) {
                        mysqli_stmt_bind_param($stmt,"sss",$subject_name,$subject_code,$tutor_id);
                        mysqli_stmt_execute($stmt);
                        header("Location: dashboard.php?msg=New Subject record created successfully!");
                        exit();
                    }
                    else {
                        header("Location: dashboard.php?msg=No Tutor exist with the Id ".$tutor_id.". Ensure that a tutor with this id exist, then try again!");
                        exit();
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
        <title>Add Subject</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
            Admin Dashboard!
        </nav>

        <div class="container">
            <div class="text-center" mb-4>
                <h3>Add New Subject</h3>
                <p class="text-muted">Complete the below form to add a new Subject!</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width: 50vw; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Subject Name:</label>
                            <input type="text" class="form-control" name="subject_name" placeholder="Subject Name">
                        </div>
                        <div class="col">
                            <label class ="form-label">Subject Code:</label>
                            <input type="text" class="form-control" name="subject_code" placeholder="Subject Code">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor ID :</label>
                            <input type="text" class="form-control" name="tutor_id" placeholder="Tutor ID">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="dashboard.php?msg=No Subject Added!" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    </body>
</html>
