<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
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
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/steven_style.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/steven_style.css">
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
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                        <input type="text" name="daterange" id="schedule-range">
                        <div style="display:flex">
                            <button class="btn-schedule-go" id="btn-schedule-go">Go</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="schedule-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Employee</th>
                                            <th class="border-top-0" >Day 1</th>
                                            <th class="border-top-0">Day 2</th>
                                            <th class="border-top-0">Day 3</th>
                                            <th class="border-top-0" >Day 4</th>
                                            <th class="border-top-0" >Day 5</th>
                                            <th class="border-top-0" >Day 6</th>
                                            <th class="border-top-0" >Day 7</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===================== FORM POP-UP =========================== -->
                <div class="form-popup" >
                    <div class="container form-wrapper" style="border-radius: 20px;">
                        <button class="btn close-form" style="border-radius: 20px;">Close</button>
                        <form action="inc.insert_employee.php" method="POST" enctype="multipart/form-data" novalidate="novalidate"  autocomplete="off">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="form-title" >Add Schedule</h1>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-12">
                                    <label for="driver">Select Driver</label>
                                    <select class="form-control" name="emp-type" id="emp-type" style="width: 100%;font-size:14px;border-color: gray;" required>
                                        <option value="DR-00001">DR-00001</option>
                                        <option value="DR-00002">DR-00002</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="pao">Select PAO</label>
                                    <select class="form-control" name="emp-type" id="emp-type" style="width: 100%;font-size:14px;border-color: gray;" required>
                                        <option value="PAO-00001">PAO-00001</option>
                                        <option value="PAO-00001">DR-00002</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="name">Select Jeepney Unit</label>
                                    <select class="form-control" name="emp-type" id="emp-type" style="width: 100%;font-size:14px;border-color: gray;" required>
                                        <option value="ABZ-2312">ABZ-2312</option>
                                        <option value="ACB-1122">ACB-1122</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="name">Schedule Date</label>
                                    <select class="form-control" name="emp-type" id="emp-type" style="width: 100%;font-size:14px;border-color: gray;" required>
                                        
                                    </select>
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
            <!-- ============================================================== -->
            <!-- footer -->
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
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- DATE RANGE PICKER JAVASCRIPT IMPORTS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- DATE RANGE END -->
    <!-- CUSTOM JS FOR SCHEDULING TAB -->
    <script src="js/a_scheduling.js"></script>
    <!-- CUSTOM JS SCHEDULE END -->
</body>

</html>