<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Ez Jeepney - Attendance</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/ez-jeepney-logo-only.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <link rel="stylesheet" href="./css/steven_style.css">
</head>
<body>
<?php
        include 'sidebar.php';
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        
                        <!-- <h4 class="page-title">Driver Attendance</h4> -->
                    </div> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                    <div class="attendance-header">
                        <h3 class="box-title">Attendance Record</h3>
                        <button class="btn-add-driver btn open-form open-add-form" id="open-add-form">Manage Leaves/Records</button>
                    </div>
                        <div class="white-box" style="display:flex;">
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="attendance-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Employee ID</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Time-In</th>
                                            <th class="border-top-0">Time-Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT att.emp_id, emp.emp_type, emp.emp_surname, emp.emp_firstname , att.time_in, att.time_out, att.attendance_date
                                        FROM `tb_attendance_sheet` as att
                                        INNER JOIN `tb_employee` as emp WHERE att.emp_id = emp.emp_id AND emp.emp_type='driver';";
                                        $dt = mysqli_query($conn, $statement);
                                        while ($result = mysqli_fetch_array($dt)){
                                            $result = "<tr><td>"  . date('F d , Y', strtotime($result['attendance_date'])) . "</td>" .
                                            "<td>"  . $result['emp_id'] . "</td>" .
                                            "<td>"  . $result['emp_firstname'] . ' ' . $result['emp_surname'] . "</td>" .
                                            "<td>"  .  date('h:i A', strtotime($result['time_in'])) . "</td>" .
                                            "<td>"  .  date('h:i A', strtotime($result['time_out'])) . "</td></tr>";
                                            echo $result;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
             <!-- ===================== FORM POP-UP =========================== -->
             <div class="form-popup" id="add-form-popup">
                    <div class="container form-wrapper">
                        <button class="btn close-form" id="close-add-form">Close</button>
                        <form action="inc.scheduling.php" method="POST" enctype="multipart/form-data" novalidate="novalidate"  autocomplete="off">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="form-title" >Manage Leaves/Attendance</h1>
                                </div>
                            </div>
                            <table class="table text-nowrap" id="leaves-table">
                                <thead>
                                    <tr>
                                    <th class="border-top-0">Employee ID</th>
                                    <th class="border-top-0">Apply Date</th>
                                    <th class="border-top-0">Leave Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM tb_employee_leaves";
                                        $query = mysqli_query($conn, $sql);
                                        while($result = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $result['emp_id']; ?></td>
                                        <td><?php echo $result['apply_date']; ?></td>
                                        <td><select name="leave-status" class="leave-status" id="leave-status">
                                            <option value="PENDING">PENDING</option>
                                            <option value="APPROVED">APPROVED</option>
                                        </select></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="form-check">
                                    <label>
                                    </label>
                                </div>
                            <input type="submit" class="btn send-form" name="update-Leaves" value="Add Schedule" >
                        </form>
                    </div>
                </div>
                <!-- ============================================================= -->
            <!-- ============================================================== -->
        </div>
            <!-- footer -->
        <div class="footer"></div>
            <!-- ============================================================== -->
            <footer class="footer text-center"> ©2022  EZ JEEPNEY </footer>
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
    <script src="js/attendance.js"></script>
</body>

</html>