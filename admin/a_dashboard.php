<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Ez Jeepney - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Favicon icon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="../images/favicon.ico">
    <!-- Custom CSS -->
    <!-- <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> -->
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> OLD CSS -->
    <link rel="stylesheet" href="css/steven_style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
    <?php
        include 'sidebar.php';
        include '../dbh.inc.php';
        $coop = $_SESSION['admin-coop'];
        // query for present details
        $sql = "SELECT COUNT(*) AS present_driver FROM tb_attendance_sheet tba LEFT JOIN tb_employee tbe ON tba.emp_id = tbe.emp_id WHERE tbe.emp_coop = '$coop' AND attendance_date = CURDATE() AND  tba.emp_id LIKE 'DR%';";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query);
        $presentDrivers = $result['present_driver'];
        $sql = "SELECT COUNT(*) AS present_pao FROM tb_attendance_sheet tba LEFT JOIN tb_employee tbe ON tba.emp_id = tbe.emp_id WHERE tbe.emp_coop = '$coop' AND attendance_date = CURDATE() AND  tba.emp_id LIKE 'PAO%';";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query);
        $presentPaos = $result['present_pao'];
        // $sql = "SELECT COUNT(*) AS jeepney_on_route FROM tb_jeepneys_on_route WHERE schedule_date = CURDATE() AND attendance_date = CURDATE() AND driver_id LIKE 'DR%'";
        // $query = mysqli_query($conn, $sql);
        // $result = mysqli_fetch_array($query);
        $jeepneysOnRoute = $presentDrivers;
    ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="display: flex;">
                        <h3 class="page-title">Good day, <?php echo $_SESSION['admin-id'] ?>!</h3>                    </div>
                        <h3 id="coop" style="display:none"><?= $coop; ?></h3>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal"></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <h5 class="page-title-date">Today is <?php echo date('l, F d Y.'); ?></h5>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                        <div style="display:flex;">
                                <div style="width:50%;padding-top:20px;padding-left:20px;color:#313131">
                                    <i class="fa-solid fa-id-card fa-2xl"></i>
                                </div>
                                <div style="text-align: right;width:50%;">
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li class="ms-auto"><span ><button type="button" class="counter text-info" id="present-drivers"><?php echo $presentDrivers ?></button></span>
                                        </li>
                                    </ul>
                                    <h3 class="box-title">Present Drivers</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                        <div style="display:flex;">
                                <div style="width:50%;padding-top:20px;padding-left:20px;color:#313131">
                                <i class="fa-solid fa-chalkboard-user fa-2xl"></i>
                                </div>
                                <div style="text-align: right;width:50%;">
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li class="ms-auto"><span><button type="button" class="counter text-info" id="present-paos"><?php echo $presentPaos ?></button></span>
                                        </li>
                                    </ul>
                                    <h3 class="box-title">Present PAOs</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <div style="display:flex;">
                                <div style="width:50%;padding-top:20px;padding-left:20px;color:#313131">
                                    <i class="fa-solid fa-bus-simple fa-2xl"></i>
                                </div>
                                <div style="text-align: right;width:50%;">
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li class="ms-auto"><span class="counter text-info"><button type="button" class="counter text-info" id="jeepneys-on-route"><?php echo $jeepneysOnRoute; ?></button></span>
                                        </li>
                                    </ul>
                                    <h3 class="box-title">Jeepneys On-route</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- ATTENDANCE GRAPH -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 ">
                        <div class="white-box">
                            <!-- <h3 class="box-title">Daily Earnings</h3> -->
                            <h3 class="box-title">Daily Attendance</h3>
                            <div class="d-md-flex">
                            </div>
                            <div id="area-chart" style="height: 250px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 ">
                        <div class="white-box">
                            <h3 class="box-title">Daily Revenue</h3>
                            <div class="d-md-flex">
                            </div>
                            <!-- <label class="label label-success">Line Chart</label> -->
                            <div id="bar-chart" ></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                        <div class="white-box-2" style="display: flex;">
                            <div class="dashboard-child">
                                <div class="dashboard-child-inner">
                                    <div style="display: flex;">
                                        <div class="percentage-label">
                                            <p><strong>New Employees</strong></p>
                                        </div>
                                        <div class="percentage">
                                            <p><strong>+10%</strong></p>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar w-75" style="background-color:#7E6910" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-child">
                                <div class="dashboard-child-inner">
                                    <div style="display: flex;">
                                        <div class="percentage-label">
                                            <p><strong>Earnings</strong></p>
                                        </div>
                                        <div class="percentage">
                                            <p><strong>+25%</strong></p>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar w-25" style="background-color: #487228" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-child">

                                <div class="dashboard-child-inner">
                                    <div style="display: flex;">
                                        <div class="percentage-label">
                                            <p><strong>Expenses</strong></p>
                                        </div>
                                        <div class="percentage">
                                            <p><strong>+50%</strong></p>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div style="background-color:#7F1000;" class="progress-bar w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-child">

                                <div class="dashboard-child-inner">
                                    <div style="display: flex;">
                                        <div class="percentage-label">
                                            <p><strong>Profits</strong></p>
                                        </div>
                                        <div class="percentage">
                                            <p><strong>+75%</strong></p>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar w-75" style="background-color: #385482" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 ">
                        <div class="white-box top-workers">
                          <h4 style="text-align: center;">Top Employees (Work Hours)</h4>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Employee</th>
                                        <th class="border-top-0">Hours Worked</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // $sql = "SELECT * FROM view_top_worker_hours";
                                    // $query = mysqli_query($conn, $sql);
                                    // while($result = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td ><?php //echo $result['emp_id'] ?><td>
                                        <td ><?php //echo $result['hours_worked'] ?><td>
                                    </tr>
                                    <?php //} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
            <!-- ===================== PRESENT DRIVER POP-UP =========================== -->
            <div class="form-popup" id="view-present-driver">
                    <div class="container form-wrapper add-report-container">
                        <button class="btn close-form" id="close-add-form">Close</button>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h2 class="form-title" >Present Driver(s):</h2>
                                </div>
                               
                                <div class="form-group col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap" id="present-driver-table">
                                            <thead>
                                                <tr>
                                                    <th>Driver Name</th>
                                                    <th>Time-in</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sql = "SELECT tba.emp_id, emp_firstname, emp_surname, time_in FROM tb_attendance_sheet tba LEFT JOIN tb_employee tbe ON tba.emp_id = tbe.emp_id WHERE tba.emp_id LIKE 'DR%' AND attendance_date = CURDATE()";
                                                    $query = mysqli_query($conn, $sql);
                                                    $i = 1;
                                                    while($result = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $i . ". " . $result['emp_firstname'] . " " . $result['emp_surname'] . " (" . $result['emp_id'] . ")"; ?></td>
                                                    <td><?php echo date('h:m A', strtotime($result['time_in'])); ?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================= -->
            <!-- ===================== PRESENT PAO POP-UP =========================== -->
              <div class="form-popup" id="view-present-pao">
                    <div class="container form-wrapper add-report-container">
                        <button class="btn close-form" id="close-add-form">Close</button>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h2 class="form-title" >Present PAO(S):</h2>
                                </div>
                               
                                <div class="form-group col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap" id="present-driver-table">
                                            <thead>
                                                <tr>
                                                    <th>PAO Name</th>
                                                    <th>Time-in</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sql = "SELECT tba.emp_id, emp_firstname, emp_surname, time_in FROM tb_attendance_sheet tba LEFT JOIN tb_employee tbe ON tba.emp_id = tbe.emp_id WHERE tba.emp_id LIKE 'PAO%' AND attendance_date = CURDATE()";
                                                    $query = mysqli_query($conn, $sql);
                                                    $i = 1;
                                                    while($result = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $i . ". " . $result['emp_firstname'] . " " . $result['emp_surname'] . " (" . $result['emp_id'] . ")"; ?></td>
                                                    <td><?php echo date('h:m A', strtotime($result['time_in'])); ?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================= -->
             <!-- ===================== PRESENT JEEPNEY ON ROUTE POP-UP =========================== -->
             <div class="form-popup" id="view-jeepneys-on-route">
                    <div class="container form-wrapper add-report-container">
                        <button class="btn close-form" id="close-add-form">Close</button>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h2 class="form-title" >Jeepney(S):</h2>
                                </div>
                               
                                <div class="form-group col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap" id="present-driver-table">
                                            <thead>
                                                <tr>
                                                    <th>Jeepney Plate Number</th>
                                                    <th>Driver</th>
                                                    <th>PAO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sql = "SELECT DISTINCT plate_number, driver_id, pao_id FROM `tb_attendance_sheet` tba INNER JOIN tb_schedule_sheet tbs ON tba.emp_id = tbs.driver_id AND tba.attendance_date = tbs.schedule_date WHERE tba.attendance_date = CURDATE();";
                                                    $query = mysqli_query($conn, $sql);
                                                    $i = 1;
                                                    while($result = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                        <td><?php echo  $result['plate_number']; ?></td>
                                                        <td><?php echo $result['driver_id']; ?></td>
                                                        <td><?php echo $result['pao_id']; ?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================= -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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
    <!-- CHART FOR ATTENDANCE KEEPING -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="js/pages/dashboard1.js"></script>
    <!--chartis chart-->
    <!-- <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script> -->
</body>

</html>