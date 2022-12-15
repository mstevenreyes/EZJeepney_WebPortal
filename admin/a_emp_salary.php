<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <title>Ez Jeepney - Payroll</title>
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
        <!-- EZ Jeepney Custom Styles-->
    <link rel="stylesheet" href="css/steven_style.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Timepicker CSS-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="display: flex;">
                        <h3 class="page-title" style="min-width: 500px;">Payroll Reports</h3>
                    </div> 
                    <button class="btn-add-driver btn open-form open-add-form" id="open-add-form">Generate Payroll</button>
                    <!-- <button class="btn-add-driver btn open-form open-edit-form" id="open-edit-form">Edit Schedule</button> -->
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
                     
                        </div>
                            <div class="table-responsive center">
                                <table class="table text-nowrap" id="schedule-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Employee</th>
                                            <th class="border-top-0">Days Worked</th>
                                            <th class="border-top-0">Gross Pay</th>
                                            <th class="border-top-0">Total Deduction</th>
                                            <th class="border-top-0">Net Pay</th>
                                            <th class="border-top-0">Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                            include '../dbh.inc.php';
                                            $sql = "SELECT * FROM tb_payroll_report";
                                            $query = mysqli_query($conn, $sql);
                                            while($result = mysqli_fetch_array($query)){
                                       ?>
                                        <tr>
                                            <td><?php echo $result['salary_id'] ?></td>
                                            <td><?php echo $result['emp_id'] ?></td>
                                            <td><?php echo $result['days_worked'] ?></td>
                                            <td><?php echo $result['grosspay'] ?></td>
                                            <td><?php echo $result['deduction'] ?></td>
                                            <td><?php echo $result['netpay'] ?></td>
                                            <td>-</td>
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
                        <form action="inc.scheduling.php" method="POST"  autocomplete="off">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="form-title" >Report Details</h1>
                                </div>
                            </div>
                            <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="schedule-type">Select Staff Type</label>
                                            <select class="form-control" name="staff-type" id="staff-type">
                                                <option value="driver">Driver</option>
                                                <option value="pao">PAO/Conductor</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6" name="schedule-date" id="date-day">
                                            <label for="schedule-date">Select Start & End Date</label>
                                            <input type="text" class="form-control" name="payroll-range" id="payroll-range" required>
                                        </div>
                                        
                                    </div>
                                <div class="form-check">
                                    <label>
                                    </label>
                                </div>
                            <button type="button" class="btn send-form" id="generate-payroll" name="generate-payroll">Generate</button>
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
    <script src="js/emp_salary.js"></script>
                            

    


</body>
</html>