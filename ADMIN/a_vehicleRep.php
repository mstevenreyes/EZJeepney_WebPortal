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
    <title>Vehicle Report - Majetsco</title>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
    <?php
        include_once 'sidebar.php';
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
                        <h4 class="page-title">Vehicle Report</h4>
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
                            <h3 class="box-title">Vehicle Report</h3> <br>

                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Vehicle Plate Number</th>
                                            <th class="border-top-0">Start of Maintenance</th>
                                            <th class="border-top-0">End of Maintenance</th>
                                            <th class="border-top-0">Reason of Report</th>
                                            <th class="border-top-0">Maintenance Cost</th>
                                            <th class="border-top-0">Vehicle Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $statement = "SELECT * FROM tb_maintenance";
                                            $dt = mysqli_query($conn, $statement);
                                            while ($result = mysqli_fetch_array($dt)){
                                                $result = "<tr><td>"  . $result['plate_number'] . "</td>" .
                                                "<td>"  . date("F d, Y", strtotime($result['date_issued'])) . "</td>" .
                                                "<td>"  . date("F d, Y", strtotime($result['date_fixed']))  . "</td>" .
                                                "<td>"  . $result['description'] . "</td>" .
                                                "<td>"  . $result['maintenance_cost'] . "</td></tr>";
                                                echo $result;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="white-box">
                            <h3 class="box-title">Maintenance Schedule</h3> <br>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Vehicle Plate Number</th>
                                            <th class="border-top-0">Date of Maintenance</th>
                                            <th class="border-top-0">Vehicle Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $statement = "SELECT * FROM tb_maintenance";
                                            $dt = mysqli_query($conn, $statement);
                                            while ($result = mysqli_fetch_array($dt)){
                                                $result = "<tr><td>"  . $result['plate_number'] . "</td>" .
                                                "<td>"  . date("F d, Y", strtotime($result['date_issued'])) . "</td>";
                                                echo $result;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action = "a_vehicleRep_inc.php" method="POST">
                <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="col-lg-4 col-md-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Maintenance Expense</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT maintenance_cost FROM tb_maintenance;";
                                        $dt = mysqli_query($conn, $statement);
                                        $maintenance_cost = 0;
                                        while ($result = mysqli_fetch_array($dt)){
                                            $maintenance_cost += $result['maintenance_cost']; 
                                        }
                                        // echo $maintenance_cost;
                                    ?>
                                <li class="ms-auto"><span class="counter text-danger">₱<?php echo $maintenance_cost ?></span></li>
                                </ul>
                            </div>
                        </div>
                </div>
                <div class="col-sm-12">
                    <div class="white-box"> 
                        <div class="form-group mb-4">

                        <div class="form-group mb-4">
                            <div class="col-sm-12">Date Issued<br>
                                <div class="col-sm-12 border-bottom">
                                    <input type="date" name="DateIssued" id="DateIssued" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()' required>
                                        <noscript>
                                            <input type="submit" value="submit">
                                        </noscript>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Plate Number<br>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none p-0 border-0 form-control">
                                        <option class="e_select" value="" selected="true" disabled="disabled"></option>
                                        <?php
                                            require_once '../dbh.inc.php'; 
                                            $statement = "SELECT plate_number FROM tb_jeepney";
                                            $dt = mysqli_query($conn, $statement);

                                            while ($result = mysqli_fetch_array($dt)){
                                            unset($plateNum);
                                            $plateNum = $result['plate_number'];
                                            $result = "<option class = e_select value= '$itemName'>" . $result['plate_number'] . "</option>";
                                            echo $result;
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Defective Part<br>
                                <div class="form-select shadow-none p-0 border-0 form-control">
                                    <textarea rows="5" class="form-control p-0 border-0" name="defectPart" id="defectPart"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Reason for Maintenance<br>
                                <div class="col-md-12 border-bottom p-0">
                                    <select class="form-select shadow-none p-0 border-0 form-control" name="description" id="description">
                                        <option class="e_select" value="" selected="true" disabled="disabled"></option>
                                        <option class="e_select" value="Maintenance">Scheduled Maintenance</option>
                                        <option class="e_select" value="Defective Part">Defective Part Found</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Date Fixed<br>
                                <div class="col-sm-12 border-bottom">
                                    <input type="date" name="DateFixed" id="DateFixed" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()'>
                                        <noscript>
                                            <input type="submit" value="submit">
                                        </noscript>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Maintenance Cost<br>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" class="form-control p-0 border-0" name="MaintenanceCost" id="MaintenanceCost"> 
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-success" style="color: white ">Submit Maintenance Report</button>
                    </div>
                </div>
                </div>
                </form>
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
</body>

</html>