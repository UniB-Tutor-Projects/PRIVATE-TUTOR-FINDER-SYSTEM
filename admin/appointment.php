<?php
    require('includes/display_data.php');
?>

<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-header">Displaying All Appointments Scheduled</h2>
                    </div>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                        <td>Appointment ID</td>
                        <td>Tutor ID</td>
                        <td>Tutor Name</td>
                        <td>Subject Turoring</td>
                        <td>Tutor Phone</td>
                        <td>Tutor Email</td>
                        <td>Tutor Address</td>
                        <td>Appointment Date</td>
                        </tr>
                        <tr>
                            <?php
                                $exist = no_data("appointment");
                                if($exist == 0){
                                    echo "<h3>No Appointments Scehduled!</h3>";
                                }
                                global $conn;
                                $sql = "SELECT appointment.appointment_id, tutor.tutor_id, tutor.name, tutor.subject_tutoring, tutor.tutor_phone, tutor.tutor_email, tutor.tutor_address,appointment.appointment_date FROM appointment,tutor WHERE appointment.tutor_id = tutor.tutor_id";
                                $query = mysqli_query($conn, $sql);
                                
                                $sql_check = "SELECT count(*) as total from appointment";
                                $query_check = mysqli_query($conn,$sql_check);
                                $result = mysqli_fetch_array($query_check);
                                
                                while($row = mysqli_fetch_assoc($query)){
                            ?>
                                
                                    <td><?php echo $row['appointment_id']; ?></td>
                                    <td><?php echo $row['tutor_id']; ?></td>
                                    <td><?php echo $row['tutor_name']; ?></td>
                                    <td><?php echo $row['subject_tutoring']; ?></td>
                                    <td><?php echo $row['tutor_phone']; ?></td>
                                    <td><?php echo $row['tutor_email']; ?></td>
                                    <td><?php echo $row['tutor_address']; ?></td>
                                    <td><?php echo $row['appointment_date']; ?></td>
                            </tr>
                                <?php
                                }
                                ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
