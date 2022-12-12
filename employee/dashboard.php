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
    <title>Employee Dashboard - EZ Jeepney</title>
</head>
<body>

    <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';
    ?>


    <!--main dashboard-->

    <main>
        <h1>Good Day, <?php echo $empFirstname . "!"; ?></h1>
        <div class="index-dashboard-container">
            <div class="card total2">
                <div class="info">
                    <div class="info-detail">
                        <?php
                        // Checks if assign or no assign schedule
                        $sql = "SELECT * FROM tb_schedule_sheet WHERE schedule_date = CURDATE() AND driver_id = '$empID' OR pao_id = '$empID'";
                        $query = mysqli_query ($conn, $sql);
                        // $result = mysqli_get_res
                        if(mysqli_num_rows($query)!=0){
                            while($result = mysqli_fetch_assoc($query)){

                        ?>
                        <h3><?php echo $result['plate_number']; ?></h3>
                        <p>Assigned Jeepney Today</p>
                        <?php
                            }
                        }else{
                        ?>
                            <h4>No Assigned Schedule Today.</h4>
                        <?php
                            } 
                        ?>
                    </div>
                    <div class="info-image">
                        <i class="fa fa-bus"></i>
                    </div>
                </div>
            </div>
            <div class="card total3">
                <div class="info leave">
                    <div class="info-detail">
                        <h3>
                            <?php 
                                $sql = "SELECT COUNT(*) AS total_leaves_taken FROM tb_employee_leaves WHERE emp_id = '$empID' AND YEAR(apply_date) = YEAR(CURDATE())";
                                $query = mysqli_query($conn, $sql);
                                $leavesQuery = mysqli_fetch_assoc($query);
                                $leavesTaken = $leavesQuery['total_leaves_taken'];
                                echo $leavesTaken;
                            ?>
                        </h3>
                        <p>Leaves Taken This Year</p>
                    </div>
                </div>
                <div class="info-detail">
                    <button id="apply-leave">Apply Leave</button>
                </div>
            </div>
            <div class="card total4">
                <div class="info">
                    <div class="info-detail">
                        <h3>1</h3>
                        <p>Present</p>
                    </div>
                    <div class="vl"></div>
                    <div class="info-detail">
                        <h3>2</h3>
                        <p>Absences</p>
                    </div>   
                </div>
                <div class="info-detail">
                    <a href="attendance.php">
                        <button>View Attendance Records</button>
                    </a>
                </div>
            </div>

           
        </div>

        <div class="index-dashboard-container2">
            <h3>Special Non-Working Holidays</h3>
            <div class="grid-container">
                <div class="grid">February 1 : Chinese Lunar New Year</div>
                <div class="grid">February 25 : EDSA People Power Revolution Anniversary</div>
                <div class="grid">April 16 : Black Saturday (Holy Week)</div>
                <div class="grid">May 9 : Election Day</div>
                <div class="grid">August 21 : Ninoy Aquino Day</div>
                <div class="grid">October 31 : Eve of All Saints' Day</div>
                <div class="grid">November 1 : All Saints' Day</div>
                <div class="grid">December 8 : Feast of the Immaculate Conception of Mary</div>
            </div>
            <br>
            <h3>Special Working Holidays</h3>
            <div class="grid-container">
                <div class="grid">November 2 : All Souls' Day</div>
                <div class="grid">December 24 : Christmas Eve</div>
                <div class="grid">December 31 : New Year's Eve</div>
            </div>
        </div>
            <div class="eom-card">
                <div class="eomcardu" data-label="<?php echo $date = date('F', strtotime('-1 month')); ?>">
                    <div class="info-detail">
                        <img style="width: 122px;
                                            height: 113px;
                                            object-fit: cover;
                                            border-radius: 10%;" src="./employee_images/eoftm/eoftm.png" id="img3" alt="">
                        <h3>Jane Doe</h3>
                        <p>PAO</p>
                        <h1>Employee of the Month</h1>
                    </div>
                  </div>
                </div>
                </div>
            
             
        
    </main>
     <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--This page JavaScript -->
    <!-- CHART FOR DASHBOARD GRAPHS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./js/pages/dashboard.js"></script>

</body>
</html>
