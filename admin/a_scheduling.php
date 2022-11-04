<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <title>Driver Attendance - Majetsco</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/majetsco_logo.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- EZ Jeepney Custom Styles-->
    <link rel="stylesheet" href="css/steven_style.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
<?php
        include 'sidebar.php';
        $timezone = date_default_timezone_set('Asia/Taipei');
        if(!isset($_POST['start-date'])){
            $day1= new DateTime('today');
            $day2= new DateTime('+1 day');
            $day3= new DateTime('+2 day');
            $day4= new DateTime('+3 day');
            $day5= new DateTime('+4 day');
            $day6= new DateTime('+5 day');
            $day7= new DateTime('+6 day');

            
        }else{
            $day1String = $_POST['start-date'];
            $day1 = new DateTime($_POST['start-date']);
            $day2= new DateTime($_POST['start-date']);
            $day2->add(new DateInterval('P1D'));
            $day3= new DateTime($_POST['start-date']);
            $day3->add(new DateInterval('P2D'));
            $day4= new DateTime($_POST['start-date']);
            $day4->add(new DateInterval('P3D'));
            $day5= new DateTime($_POST['start-date']);
            $day5->add(new DateInterval('P4D'));
            $day6= new DateTime($_POST['start-date']);
            $day6->add(new DateInterval('P5D'));
            $day7= new DateTime($_POST['start-date']);
            $day7->add(new DateInterval('P6D'));

            // $day2= new DateTime('+1 day');
            // $day3= new DateTime('+2 day');
            // $day4= new DateTime('+3 day');
            // $day5= new DateTime('+4 day');
            // $day6= new DateTime('+5 day');
            // $day7= new DateTime('+6 day');
        }
        
        $day1Formatted = $day1->format('Y-m-d');
        $day2Formatted = $day2->format('Y-m-d');
        $day3Formatted = $day3->format('Y-m-d');
        $day4Formatted = $day4->format('Y-m-d');
        $day5Formatted = $day5->format('Y-m-d');
        $day6Formatted = $day6->format('Y-m-d');
        $day7Formatted = $day7->format('Y-m-d');
    
        $day1Number = $day1->format('d');
        $day2Number = $day2->format('d');
        $day3Number = $day3->format('d');
        $day4Number = $day4->format('d');
        $day5Number = $day5->format('d');
        $day6Number = $day6->format('d');
        $day7Number = $day7->format('d');

        $day1monthName = getMonthName($day1Formatted); // Gets month name 
        $day2monthName = getMonthName($day2Formatted); // Gets month name 
        $day3monthName = getMonthName($day3Formatted);
        $day4monthName = getMonthName($day4Formatted);
        $day5monthName = getMonthName($day5Formatted);
        $day6monthName = getMonthName($day6Formatted);
        $day7monthName = getMonthName($day7Formatted);
        function getMonthName($date){
            $monthName = '';
            $month = substr($date, 5, 2);
            switch($month){
                case '01':
                    $monthName = 'January';
                    break;
                case '02':
                    $monthName = 'February';
                    break;
                case '03':
                    $monthName = 'March';
                    break;
                case '04':
                    $monthName = 'April';
                    break;
                case '05':
                    $monthName = 'May';
                    break;
                case '06':
                    $monthName = 'June';
                    break;
                case '07':
                    $monthName = 'July';
                    break;
                case '08':
                    $monthName = 'August';
                    break;
                case '09':
                    $monthName = 'September';
                    break;
                case '10':
                    $monthName = 'October';
                    break;
                case '11':
                    $monthName = 'November';
                    break;
                case '12':
                    $monthName = 'December';
                    break;
                default:
                    $monthName = 'Invalid';
            }
            return $monthName;
        }
?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Daily Scheduling - Majetsco</h4>
                        <p>Employee Scheduling</p>
                        <div style="display:flex">
                            <button class="btn-add-driver btn open-form">Add Schedule</button>
                        </div>
                    </div> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <div class="row white-box">
                    <div class="col-sm-12">
                        <div style="display:flex">
                            <div class="white-box">
                                <form action="a_scheduling.php" method="POST">
                                    <label for="start-date">Start Date</label>
                                    <input type="text" class="datepicker" name="start-date" id="start-date" autocomplete="off">
                                    <label for="end-date">End Date</label>
                                    <input type="text" class="" name="end-date" id="end-date" readonly>
                                    <input type="submit" class="btn-schedule-go" id="btn-schedule-go" value="Go">
                                </form>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="schedule-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Employee</th>
                                            <th class="border-top-0" ><?php echo $day1monthName . " " . $day1Number; ?></th>
                                            <th class="border-top-0"><?php echo $day2monthName . " " . $day2Number;  ?></th>
                                            <th class="border-top-0"><?php echo $day3monthName . " " . $day3Number;  ?></th>
                                            <th class="border-top-0" ><?php echo $day4monthName . " " . $day4Number;  ?></th>
                                            <th class="border-top-0" ><?php echo $day5monthName . " " . $day5Number;  ?></th>
                                            <th class="border-top-0" ><?php echo $day6monthName . " " . $day6Number;  ?></th>
                                            <th class="border-top-0" ><?php echo $day7monthName . " " . $day7Number;  ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            include '../dbh.inc.php';
                                            $sql = "SELECT * FROM tb_employee";
                                            $query = mysqli_query($conn, $sql);
                                            while($result = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td ><img class="schedule-emp-img" src="../employee/employee_profiles/<?php echo $result['emp_id'] . '/' . $result['emp_id'] . '.png"' ?> alt="photo"><h5><?php echo $result['emp_id']; ?></h5></td>
                                            <!-- Day 1 -->
                                            <td><?php 
                                                    $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE emp_id = ? AND schedule_date = ?";
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                        echo "ERROR: " . mysqli_error($conn);
                                                    }
                                                    mysqli_stmt_bind_param($stmt, "ss", $result['emp_id'], $day1Formatted );
                                                    mysqli_stmt_execute($stmt);
                                                    $result2 = mysqli_stmt_get_result($stmt);
                                                    if(is_null($row = mysqli_fetch_array($result2)) ){
                                                ?>
                                            <button class="open-form">Add Schedule</button>
                                            <?php }else{ echo '<p>Schedule: ' . $row['schedule_date'] . '<br>ID: ' . $row['emp_id'] . '<br>Jeep Unit: ' . $row['plate_number'] . '</p>'; } ?>
                                            </td>
                                            <!-- Day 2 -->
                                            <td><?php 
                                                    $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE emp_id = ? AND schedule_date = ?";
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                        echo "ERROR: " . mysqli_error($conn);
                                                    }
                                                    mysqli_stmt_bind_param($stmt, "ss", $result['emp_id'], $day2Formatted );
                                                    mysqli_stmt_execute($stmt);
                                                    $result2 = mysqli_stmt_get_result($stmt);
                                                    if(is_null($row = mysqli_fetch_array($result2)) ){
                                                ?>
                                            <button class="open-form">Add Schedule</button>
                                            <?php }else{ echo '<p>Schedule: ' . $row['schedule_date'] . '<br>ID: ' . $row['emp_id'] . '<br>Jeep Unit: ' . $row['plate_number'] . '</p>'; } ?>
                                            </td>
                                            <!-- ====== -->
                                            <!-- Day 3  -->
                                             <td><?php 
                                                    $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE emp_id = ? AND schedule_date = ?";
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                        echo "ERROR: " . mysqli_error($conn);
                                                    }
                                                    mysqli_stmt_bind_param($stmt, "ss", $result['emp_id'], $day3Formatted );
                                                    mysqli_stmt_execute($stmt);
                                                    $result2 = mysqli_stmt_get_result($stmt);
                                                    if(is_null($row = mysqli_fetch_array($result2)) ){
                                                ?>
                                            <button class="open-form">Add Schedule</button>
                                            <?php }else{ echo '<p>Schedule: ' . $row['schedule_date'] . '<br>ID: ' . $row['emp_id'] . '<br>Jeep Unit: ' . $row['plate_number'] . '</p>'; } ?>
                                            </td>
                                            <!-- ====  -->
                                            <!-- Day 4 -->
                                            <td><?php 
                                                    $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE emp_id = ? AND schedule_date = ?";
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                        echo "ERROR: " . mysqli_error($conn);
                                                    }
                                                    mysqli_stmt_bind_param($stmt, "ss", $result['emp_id'], $day4Formatted );
                                                    mysqli_stmt_execute($stmt);
                                                    $result2 = mysqli_stmt_get_result($stmt);
                                                    if(is_null($row = mysqli_fetch_array($result2)) ){
                                                ?>
                                            <button class="open-form">Add Schedule</button>
                                            <?php }else{ echo '<p>Schedule: ' . $row['schedule_date'] . '<br>ID: ' . $row['emp_id'] . '<br>Jeep Unit: ' . $row['plate_number'] . '</p>'; } ?>
                                            </td>
                                            <!-- ===== -->
                                            <!-- Day 5 -->
                                            <td><?php 
                                                    $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE emp_id = ? AND schedule_date = ?";
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                        echo "ERROR: " . mysqli_error($conn);
                                                    }
                                                    mysqli_stmt_bind_param($stmt, "ss", $result['emp_id'], $day5Formatted );
                                                    mysqli_stmt_execute($stmt);
                                                    $result2 = mysqli_stmt_get_result($stmt);
                                                    if(is_null($row = mysqli_fetch_array($result2)) ){
                                                ?>
                                            <button class="open-form">Add Schedule</button>
                                            <?php }else{ echo '<p>Schedule: ' . $row['schedule_date'] . '<br>ID: ' . $row['emp_id'] . '<br>Jeep Unit: ' . $row['plate_number'] . '</p>'; } ?>
                                            </td>
                                            <!--  -->
                                            <!-- Day 6 -->
                                            <td><?php 
                                                    $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE emp_id = ? AND schedule_date = ?";
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                        echo "ERROR: " . mysqli_error($conn);
                                                    }
                                                    mysqli_stmt_bind_param($stmt, "ss", $result['emp_id'], $day6Formatted );
                                                    mysqli_stmt_execute($stmt);
                                                    $result2 = mysqli_stmt_get_result($stmt);
                                                    if(is_null($row = mysqli_fetch_array($result2)) ){
                                                ?>
                                            <button class="open-form">Add Schedule</button>
                                            <?php }else{ echo '<p>Schedule: ' . $row['schedule_date'] . '<br>ID: ' . $row['emp_id'] . '<br>Jeep Unit: ' . $row['plate_number'] . '</p>'; } ?>
                                            </td>
                                            <!--  -->
                                            <!-- Day 7 -->
                                            <td><?php 
                                                    $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE emp_id = ? AND schedule_date = ?";
                                                    $stmt = mysqli_stmt_init($conn);
                                                    if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                        echo "ERROR: " . mysqli_error($conn);
                                                    }
                                                    mysqli_stmt_bind_param($stmt, "ss", $result['emp_id'], $day7Formatted );
                                                    mysqli_stmt_execute($stmt);
                                                    $result2 = mysqli_stmt_get_result($stmt);
                                                    if(is_null($row = mysqli_fetch_array($result2)) ){
                                                ?>
                                            <button class="open-form">Add Schedule</button>
                                            <?php }else{ echo '<p>Schedule: ' . $row['schedule_date'] . '<br>ID: ' . $row['emp_id'] . '<br>Jeep Unit: ' . $row['plate_number'] . '</p>'; } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===================== FORM POP-UP =========================== -->
                <div class="form-popup" id="form-popup">
                    <div class="container form-wrapper" style="border-radius: 20px;">
                        <button class="btn close-form" style="border-radius: 20px;">Close</button>
                        <form action="inc.scheduling.php" method="POST" enctype="multipart/form-data" novalidate="novalidate"  autocomplete="off">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="form-title" >Add Schedule</h1>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="driver">Select Driver</label>
                                <select class="form-control" name="driver-id" id="driver-id" required>
                                    <option value=""></option>
                                    <?php 
                                            $sql = "SELECT * FROM tb_employee WHERE emp_id LIKE 'DR%'";
                                            $query = mysqli_query($conn, $sql);
                                            while($result = mysqli_fetch_array($query)){
                                            echo "<option value='" . $result['emp_id'] . "'>" . $result['emp_id'] . " (" . $result['emp_surname'] . ", " . $result['emp_firstname'] . ")" . "</option>";
                                            }
                                    ?>
                                </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="pao">Select PAO</label>
                                    <select class="form-control" name="pao-id" id="pao-id" required>
                                        <option value=""></option>
                                        <?php 
                                             $sql = "SELECT * FROM tb_employee WHERE emp_id LIKE 'PAO%'";
                                             $query = mysqli_query($conn, $sql);
                                             while($result = mysqli_fetch_array($query)){
                                                echo "<option value='" . $result['emp_id'] . "'>" . $result['emp_id'] . " (" . $result['emp_surname'] . ", " . $result['emp_firstname'] . ")" . "</option>";
                                             }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="name">Select Jeepney Unit</label>
                                    <select class="form-control" name="plate-number" id="plate-number"  required>
                                        <option value=""></option>
                                        <?php 
                                             $sql = "SELECT * FROM tb_jeepney";
                                             $query = mysqli_query($conn, $sql);
                                             while($result = mysqli_fetch_array($query)){
                                                echo "<option value='" . $result['plate_number'] . "'>" . $result['plate_number'] . "</option>";
                                             }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="schedule-type">Select Schedule Type</label>
                                    <select class="form-control" name="schedule-type" id="schedule-type">
                                        <option value="Day">1 Day</option>
                                        <option value="range">Schedule Range</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12" name="schedule-date" id="schedule-date">
                                    <label for="schedule-date">Schedule Date</label>
                                    <input class="form-control datepicker" name="schedule-date" id="schedule-date" required>
                                </div>
                                <div class="form-group col-sm-12" name="schedule-range" id="schedule-range">
                                    <label for="schedule-range">Schedule Range</label>
                                </div>
                                <div class="form-group col-sm-6">
                                        <label for="schedule-start">Schedule Start</label>
                                        <input class="form-control datepicker" name="schedule-start" id="schedule-start" required>
                                            </div>
                                    <div class="form-group col-sm-6">
                                        <label for="schedule-start">Schedule End</label>
                                        <input class="form-control datepicker" name="schedule-start" id="schedule-start" required>
                                    </div>
                            <div class="form-check">
                                <label>
                                </label>
                            </div>
                            <input type="submit" class="btn send-form" name="submit" value="Add Schedule" style="border-radius: 20px;">
                        </form>
                    </div>
                </div>
                <!-- ============================================================= -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- footer -->
            <footer class="footer text-center"> ©2022  EZ JEEPNEY </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
   

    <!-- DATE RANGE PICKER JAVASCRIPT IMPORTS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" async></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" async></script>
    <!-- All Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> 
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
     <!-- For Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <!-- CSS For Date Range Picker and Datepicker-->                                                 
    <script src="js/a_scheduling.js"></script>
</body>

</html>