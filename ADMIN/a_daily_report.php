<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Ez Jeepney - Daily Reports</title>
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
                        <h2 class="page-title"></h2>
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
                        <h3 class="box-title">Daily Earnings/Expenses Report</h3>
                        <button class="btn-add-driver btn open-form open-add-form" id="open-add-form">Add Report &emsp13;<i class="fa-solid fa-square-plus"></i></button>
                    </div>
                        <div class="white-box" style="display:flex;">
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="attendance-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Report ID</th>
                                            <th class="border-top-0">Report Date</th>
                                            <th class="border-top-0">Employee ID</th>
                                            <th class="border-top-0">Earnings</th>
                                            <th class="border-top-0">Expenses</th>
                                            <th class="border-top-0">Final Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        // $statement = "SELECT att.emp_id, emp.emp_type, emp.emp_surname, emp.emp_firstname , att.time_in, att.time_out, att.attendance_date
                                        // FROM `tb_attendance_sheet` as att
                                        // INNER JOIN `tb_employee` as emp WHERE att.emp_id = emp.emp_id AND emp.emp_type='driver';";
                                        // $dt = mysqli_query($conn, $statement);
                                        // while ($result = mysqli_fetch_array($dt)){
                                        //     $result = "<tr><td>"  . date('F d , Y', strtotime($result['attendance_date'])) . "</td>" .
                                        //     "<td>"  . $result['emp_id'] . "</td>" .
                                        //     "<td>"  . $result['emp_firstname'] . ' ' . $result['emp_surname'] . "</td>" .
                                        //     "<td>"  .  date('h:i A', strtotime($result['time_in'])) . "</td>" .
                                        //     "<td>"  .  date('h:i A', strtotime($result['time_out'])) . "</td></tr>";
                                        //     echo $result;
                                        // }
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
                    <div class="container form-wrapper add-report-container">
                        <button class="btn close-form" id="close-add-form">Close</button>
                        <form action="#" method="POST" id="report-form" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 class="form-title" >Enter Report Details:</h3>
                                </div>
                                <div class="row daily-report" id="daily-report-form">
                                    <div class="form-group col-sm-12>
                                        <label for="report-date">Report Date: </label>
                                        <input class="datepicker" type="text" id="report-date" name="report-date" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="emp-id">Employee ID: </label>
                                        <input type="text" id="emp-id" name="emp-id" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="daily-quota">Daily Quota: </label>
                                        <input type="text" id="daily-quota" name="daily-quota" autocomplete="off" required>
                                    </div>
                                    <div id="dynamic-content">
                                        <!-- Dynamic Content will be added here -->
                                        <!-- <div class="dynamic-report-container">
                                            <div class="form-group dynamic-report">
                                                <input type="text" class="report-item" id="item-description" name="item-description" placeholder="Description" autocomplete="off" required>
                                            </div>
                                            <div class="form-group dynamic-report">
                                                <select name="earnings-type" id="earnings-type" required>
                                                    <option value="EARNINGS">Earnings</option>
                                                    <option value="EXPENSES">Expenses</option>
                                                </select>
                                            </div>
                                            <div class="form-group dynamic-report">
                                                <input type="text" class="report-item" id="item-description" name="item-description" placeholder="Amount" autocomplete="off" required>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <button type="button" class="add-item" name="add-item" id="add-item"><i class="fa-solid fa-circle-plus fa-xl"></i></button>
                                    </div>
                                </div>
                            <div class="form-check">
                                <label>
                                </label>
                            </div>
                            <button type="button" class="btn send-form submit-report" name="submit-report" id="submit-report">Submit</button>
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
    <script src="js/a_daily_report.js"></script>
</body>

</html>