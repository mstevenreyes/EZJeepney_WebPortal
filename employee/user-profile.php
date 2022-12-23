<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>User Profile - EZ Jeepney</title>
</head>
<body>

      <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';
    ?>

    <!--main dashboard-->

    <main>
        <div class="compinfo-container">
             <div class="card detail">
                    <div class="detail-header">
                        <h2>User Profile - EZ Jeepney</h2>
                    </div>
                    <div class="compform">
                        <div class="input box0">
                            <img src="<?php echo 'employee_images/' . $empID ?>.png" id="img3" alt="">
                        </div>
                        <div class="input-details">
                            <div class="input box1">
                                <!-- Note: PHP Variables located in navbar-sidebar.php -->
                                <span class="details"> <?php echo $empFirstname . ' ' . $empSurname ?></span>
                            </div>
                            <div class="input box4">
                                <span class="details"><?php echo $empID ?></i></u></span>
                            </div>
                            <div class="input box5">
                                <span class="details"><?php echo $empData['emp_status'] ?> Employee</span>
                            </div>
                            <div class="input box6">
                                <span class="details">Date Hired: <?php echo date('F d, Y', strtotime($empData['date_hired'] )); ?></span><br><br>
                            </div>
                        </div>
                        <div class="input-details">
        
                            <div class="input box4">
                                <span class="details">Date of Birth: <strong><?php echo date("F d, Y", strtotime($empBirthday)); ?></strong></span>
                            </div>
                            <div class="input box5">
                                <span class="details">Address: <strong><?php echo $empAddress ?></strong></span>
                            </div>
                            <div class="input box6">
                                <span class="details">Gender: <strong><?php echo $empGender ?></strong> </span><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="schedule-details">
                        <?php 
                            $sql = "SELECT * FROM tb_fixed_schedule WHERE emp_id = '$empID'";
                            $query = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_array($query);
                        ?>
                        <h3>Schedule Hours: <br><?php echo date("h:i A", strtotime($row['shift_start'])) . " - " . date('h:i A', strtotime($row['shift_end'])); ?> </h3>
                        <h3>Work Days: <br><?php echo $row['work_days'] ?> <br></h3>
                        <?php } ?>
                    </div>

                </div>
        

        </div>
        <?php if($empData['emp_primary_name'] != NULL){ ?>
        <div class="compinfo-container">
            <div class="card detail">
                <h2>Emergency Contacts:</h2>
                <h3>Primary</h3>
                <p>Name: <?php echo $empData['emp_primary_name']; ?></p>
                <p>Relationship: <?php echo $empData['emp_primary_relationship']; ?></p>
                <p>Contact Number: <?php echo $empData['emp_primary_phone']; ?></p>
                <h3>Secondary</h3>
                <p>Name: <?php echo $empData['emp_secondary_name']; ?></p>
                <p>Relationship: <?php echo $empData['emp_secondary_relationship']; ?></p>
                <p>Contact Number: <?php echo $empData['emp_secondary_phone']; ?></p>
            </div>
        </div>
        <?php }  ?>
    </main>
</body>
</html>
