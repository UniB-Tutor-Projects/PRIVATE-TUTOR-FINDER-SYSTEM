<?php
    require('includes/display_data.php')
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-header">Displaying All Users</h2>
                    </div>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>User ID</td>
                            <td>User Name</td>
                            <td>User Age</td>
                            <td>User Gender</td>
                            <td>User Phone Number</td>
                            <td>User Email</td>
                            <td>User Address</td>
                        </tr>
                        <tr>
                            <?php
                                $exist = no_data("users");
                                if($exist == 0){
                                    echo "<h3>No User Present</h3>";
                                }
                                $result = display_data("users");
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>

                        </tr>    
                            <?php
                                }
                            ?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
