<<<<<<< Updated upstream
 
=======
<?php
    require('includes/display_data.php');
    
?>
   <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-header">Displaying All Tutors</h2>
                    </div>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Tutor ID</td>
                            <td>Tutor Name</td>
                            <td>Tutor Age</td>
                            <td>Tutor Gender</td>
                            <td>Tutor Certificate</td>
                            <td>Subject Tutoring</td>
                            <td>Tutor Phone</td>
                            <td>Tutor Email</td>
                            <td>Tutor Address</td>
                        </tr>
                        <tr>
                            <?php
                                
                                $exist = no_data("users");
                                if($exist == 0){
                                    echo "<h3>No User Present</h3>";
                                }
                                $result = display_data("tutor");
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <td><?php echo $row['tutor_id']; ?></td>
                            <td><?php echo $row['tutor_name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['certificate']; ?></td>
                            <td><?php echo $row['subject_tutoring']; ?></td>
                            <td><?php echo $row['tutor_phone']; ?></td>
                            <td><?php echo $row['tutor_email']; ?></td>
                            <td><?php echo $row['tutor_address']; ?></td>

                        </tr>    
                            <?php
                                }
                            ?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
>>>>>>> Stashed changes
