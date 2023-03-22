<?php
session_start();

include('../includes/databaseconnection.php');
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $tutor_id = $_POST['tutor_id'];
    $subject_id = $_POST['subject_id'];
    $appointment_time_start = $_POST['appointment_time_start'];
    $appointment_time_end = $_POST['appointment_time_end'];
    $appointment_date = $_POST['appointment_date'];

    if (empty($tutor_id)||empty($subject_id)||empty($appointment_date)) {
		
		header("Location: dashboard.php?msg=Empty Fields");
		exit();
	}

    else{
        $sqlCheckTutor = "SELECT * FROM tutor WHERE tutor_id='".$_SESSION['tutorID']."'";
        $valueTutor = mysqli_query($conn, $sqlCheckTutor);

        $sqlCheckSubject = "SELECT * FROM subject WHERE subject_id='$subject_id'";
        $valueSubject = mysqli_query($conn, $sqlCheckSubject);

        $countSubjects = mysqli_num_rows($valueSubject);

        $countTutors = mysqli_num_rows($valueTutor);

        if ($countTutors==1 && $countSubjects==1 && $tutor_id == $_SESSION['tutorID']) {
            $sql = "UPDATE `appointment` SET `subject_id`='$subject_id',`appointment_time_start`='$appointment_time_start',`appointment_time_end`='$appointment_time_end',`appointment_date`='$appointment_date' WHERE appointment_id=$id";
            $result = mysqli_query($conn,$sql);
            header("Location: dashboard.php?msg=Appointment Data Updated Successfully!");
            exit();
        }

        else {
            header("Location: dashboard.php?msg=You can not change your ID, (".$_SESSION['tutorID'].")!");
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
        <title>Edit Appointment</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
            Admin Dashboard!
        </nav>

        <div class="container">
            <div class="text-center" mb-4>
                <h3>Edit Appointment Information</h3>
                <p class="text-muted">Click Update after updating any information!</p>

                <?php
               
                    $sql = "SELECT * FROM appointment WHERE appointment_id = $id LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);

                ?>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width: 50vw; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor ID:</label>
                            <input type="text" class="form-control" name="tutor_id" value="<?php echo $_SESSION['tutorID']?>">
                        </div>
                        <div class="col">
                            <label class ="form-label">Subject ID:</label>
                            <input type="text" class="form-control" name="subject_id" value="<?php echo $row['subject_id']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Start Time:</label>
                            <input type="time" class="form-control" name="appointment_time_start" value="<?php echo $row['appointment_time_start']?>">
                        </div>

                        <div class="col">
                            <label class ="form-label">Stop Time:</label>
                            <input type="time" class="form-control" name="appointment_time_end" value="<?php echo $row['appointment_time_end']?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Appointment Date:</label>
                            <input type="date" class="form-control" name="appointment_date" value="<?php echo $row['appointment_date']?>">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="dashboard.php?msg=No Changes made to Appointment with ID <?php echo $row['appointment_id'].'!' ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    </body>
</html>