<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <title>Ez Jeepney - Scheduling</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/ez-jeepney-logo-only.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- EZ Jeepney Custom Styles-->
    <link rel="stylesheet" href="css/steven_style.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Timepicker CSS-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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
        }
        
        $dayFormmatted = array();
        array_push($dayFormmatted,  $day1->format('Y-m-d'), $day2->format('Y-m-d'), $day3->format('Y-m-d'), $day4->format('Y-m-d'), $day5->format('Y-m-d'), $day6->format('Y-m-d'), 
        $day7->format('Y-m-d'));
   
?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="display: flex;">
                        <h3 class="page-title" style="min-width: 500px;">Daily Scheduling - Majetsco</h3>
                    </div> 
                    <button class="btn-add-driver btn open-form open-add-form" id="open-add-form">Add Schedule</button>
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
                        <div style="display:flex;justify-content:flex-end;">
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
                            <div class="table-responsive center">
                                <table class="table text-nowrap" id="schedule-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Employee</th>
                                            <th class="border-top-0" ><?php echo $day1->format('M d') ; ?></th>
                                            <th class="border-top-0"><?php echo $day2->format('M d');  ?></th>
                                            <th class="border-top-0"><?php echo $day3->format('M d');  ?></th>
                                            <th class="border-top-0" ><?php echo $day4->format('M d');  ?></th>
                                            <th class="border-top-0" ><?php echo $day5->format('M d');  ?></th>
                                            <th class="border-top-0" ><?php echo $day6->format('M d');  ?></th>
                                            <th class="border-top-0" ><?php echo $day7->format('M d');  ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            include '../dbh.inc.php';
                                            $coop = $_SESSION['admin-coop'];
                                            $sql = "SELECT * FROM tb_employee WHERE emp_coop='$coop'";
                                            $query = mysqli_query($conn, $sql);
                                            while($result = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td>
                                                <div style="display: flex;">
                                                    <img class="schedule-emp-img" src="../employee/employee_images/<?php echo $result['emp_id'] . '.png"' ?> 
                                                    alt="photo"><h5 class="schedule-emp-details"><strong><?php echo  strtok($result['emp_firstname'] , " "). " " . $result['emp_surname']; ?></strong>
                                                    <br><?php echo $result['emp_id']; ?> </h5>
                                                </div>
                                            </td>
                                            <!-- Day 1 to 7 -->
                                            <?php 
                                                $dayIncrement = 0;
                                                while($dayIncrement < 7){
                                            ?>
                                            <td><?php 
                                                        $myEmpId = $result['emp_id'];
                                                        $sql_tbSchedule_query="SELECT * FROM tb_schedule_sheet WHERE (driver_id = ? OR pao_id = ?) AND schedule_date = ?";
                                                        $stmt = mysqli_stmt_init($conn);
                                                        if(!mysqli_stmt_prepare($stmt, $sql_tbSchedule_query)){
                                                            echo "ERROR: " . mysqli_error($conn);
                                                        }
                                                        mysqli_stmt_bind_param($stmt, "sss", $result['emp_id'],  $result['emp_id'], $dayFormmatted[$dayIncrement] );
                                                        mysqli_stmt_execute($stmt);
                                                        $result2 = mysqli_stmt_get_result($stmt);
                                                        if(is_null($row = mysqli_fetch_array($result2)) )
                                                        {
                                                            $sql5 = "SELECT * FROM tb_fixed_schedule WHERE emp_id = '$myEmpId';";
                                                            $query5 = mysqli_query($conn, $sql5);
                                                            if( $numRows = mysqli_num_rows($query5) != 0){
                                                                $myRow = mysqli_fetch_array($query5);
                                                                echo '<button class="schedule-details open-add-form">' . date('h:i:s A', strtotime($myRow['shift_start']))  
                                                                . ' - ' . date('h:i:s A', strtotime($myRow['shift_end'])) . '<br>' . '</button>';
                                                            }else{
                                                                echo '<button class="open-add-form add-new"><i class="fa-solid fa-plus"></i></button>';
                                                            }
                                                            
                                                        }else
                                                        { 
                                                            echo '<button class="schedule-details open-edit-form">' . date('h:i:s A', strtotime($row['shift_start']))  
                                                            . ' - ' . date('h:i:s A', strtotime($row['shift_end'])) . '<br>' . $row['driver_id'] . ' / ' . $row['pao_id'] .  '<br>Jeep Unit: ' 
                                                            . $row['plate_number'] . '<br>Batch ID: ' . $row['batch_id'] . '<p style="display:none;">Schedule Date: ' . $row['schedule_date'] . '</p>' . '</button>'; 
                                                        }                                                
                                                ?>
                                            </td>

                                            <?php 
                                                $dayIncrement++;
                                                }         
                                            ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===================== FORM POP-UP =========================== -->
                <div class="form-popup" id="add-form-popup">
                    <div class="container form-wrapper">
                        <button class="btn close-form" id="close-add-form">Close</button>
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
                                                while($result = mysqli_fetch_array($query))
                                                {
                                                    echo "<option value='" . $result['emp_id'] . "'>" . $result['emp_id'] .
                                                     " (" . $result['emp_surname'] . ", " . $result['emp_firstname'] . ")" . "</option>";
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
                                                <option value="day">1 Day</option>
                                                <option value="range">Schedule Range</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12" name="schedule-date" id="date-day">
                                            <label for="schedule-date">Schedule Date</label>
                                            <input class="form-control datepicker" name="schedule-date" id="schedule-date" required>
                                        </div>
                                        <div class="row" id="date-ranger" style="display:none;">
                                            <div class="form-group col-sm-12">
                                                <label for="schedule-range">Schedule Range</label>
                                                <input type="text" class="form-control daterangerpicker" name="schedule-range" id="schedule-range" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6" name="schedule-date" id="date-day">
                                            <label for="shift-start">Shift Start</label>
                                            <input class="form-control timepicker" name="shift-start" id="add-shift-start" required>
                                        </div>
                                        <div class="form-group col-sm-6" name="schedule-date" id="date-day">
                                            <label for="shift-end">Shift End</label>
                                            <input class="form-control timepicker" name="shift-end" id="add-shift-end" required>
                                        </div>
                                    </div>
                                <div class="form-check">
                                    <label>
                                    </label>
                                </div>
                            <input type="submit" class="btn send-form" name="add-schedule" value="Add Schedule" >
                        </form>
                    </div>
                </div>
                <!-- ============================================================= -->
                <!-- ===================== EDIT FORM POP-UP =========================== -->
                <div class="form-popup" id="edit-form-popup" style="z-index: 100;">
                <div class="container form-wrapper">
                    <button class="btn close-form" id="close-edit-form" >Close</button>
                    <form action="inc.scheduling.php" method="POST" enctype="multipart/form-data" novalidate="novalidate"  autocomplete="off">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="form-title" >Update Schedule</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="batch-id">Batch ID:</label>
                                <input type="text" class="form-control" name="edit-form-batch-id" id="edit-form-batch-id" readonly>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="driver-id">Driver</label>
                                <input type="text" class="form-control" name="edit-form-driver-id" id="edit-form-driver-id" readonly>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="pao">PAO</label>
                                    <input type="text" class="form-control" name="edit-form-pao-id" id="edit-form-pao-id" readonly>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="name">Jeepney Unit</label>
                                    <input type="text" class="form-control" name="edit-form-plate-number" id="edit-form-plate-number" readonly>
                                </div>
                                <div class="form-group col-sm-12" name="schedule-date" id="date-day">
                                    <label for="schedule-date">Schedule Date</label>
                                    <input class="form-control" name="edit-form-schedule-date" id="edit-form-schedule-date" required readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="shift-start">Shift Start</label>
                                    <input class="form-control timepicker" name="shift-start" id="shift-start" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="shift-end">Shift End</label>
                                    <input class="form-control timepicker" name="shift-end" id="shift-end" required>
                                </div>
                                </div>
                            <div class="form-check">
                                <label>
                                </label>
                            </div>
                        <div class="center">
                            <input type="submit" class="btn update-btn" name="update-schedule" value="Update Schedule">
                            <input type="submit" class="btn delete-btn" name="delete-schedule" value="Delete Schedule">
                        </div>
                     

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
   

    <!-- All Jquery -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script> 
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- DATE RANGE PICKER JAVASCRIPT IMPORTS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" ></script>
    <!-- For Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!-- Timepicker JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <!-- CSS For Date Range Picker and Datepicker-->     
    <script src="js/a_scheduling.js"></script>
    <?php 
    if(isset($_GET['status'])){
        if ($_GET['status'] == 'delete-success'){echo "<script>alert('Deleted Successfully.');</script>";};  
        if ($_GET['status'] == 'insert-success'){echo "<script>alert('Inserted Successfully.');</script>";};  
        if ($_GET['status'] == 'update-success'){echo "<script>alert('Updated Successfully.');</script>";};  
        if ($_GET['status'] == 'delete-failed'){echo "<script>alert('Delete Failed.');</script>";};  
        if ($_GET['status'] == 'insert-failed'){echo "<script>alert('Insertion Failed.');</script>";};  
        if ($_GET['status'] == 'update-failed'){echo "<script>alert('Update Failed.');</script>";};    
    }
    ?>                                       

    


</body>
</html>