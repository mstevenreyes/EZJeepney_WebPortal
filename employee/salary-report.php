<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <link href="css/steven_style.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">

    
    <title>Attendance Records</title>
</head>
<body>

    <!--header or navbar-->

     <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';
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
                        <h4 class="page-title">Salary Reports - Majetsco</h4>            
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
                            <div style="text-align:center">
                                <h3 class="box-title">PAYSLIP FOR THE WEEK OF [INSERT MONTH HERE]</h3>
                                <!-- <button class="btn-add-driver btn open-form" style="margin-left: auto;bottom: 50px;">Add Schedule</button> -->
                            </div>
                            <div class="payslip-details">
                                <div class="company-details">
                                    <h3>Majetsco Cooperative</h3>
                                    <img src="images/majetsco-logo.png" alt="" style="width: 80px;">
                                    <p>29 Gov. Pascual Ave</p>
                                    <p>Malabon, 1470 Metro Manila</p>
                                </div>
                                <div class="employee-details">
                                    <?php
                                    require_once '../dbh.inc.php';
                                    //temp variables
                                    $pag_ibig = 'P150';
                                    $philhealth = 'P150';
                                    $sss = 'P150';
                                    $salary = $_GET['salary-id'];
                                    $stmt = "SELECT tbs.salary_id, tbs.emp_id, tbs.basic_salary, tbs.canteen_fees, tbs.other_deductions, tbe.emp_type, tbe.emp_surname, tbe.emp_firstname
                                     FROM tb_salary_report AS tbs LEFT JOIN tb_employee AS tbe ON  tbs.emp_id = tbe.emp_id WHERE tbs.salary_id = '$salary'";
                                    $sr = mysqli_query($conn, $stmt);
                                    

                                    while ($result = mysqli_fetch_array($sr))
                                    {
                                        echo "<p>" . $result['emp_firstname'] . " " . $result['emp_surname'] . "</p>";
                                        echo "<p>" . $salary . "</p>" . "<p>" . $result['emp_type'] . "</p>";
                                    ?>
                            
                                </div>
                                <div class="salary-details">
                                    <div class="earning-details">
                                        <h3>Earnings</h3>
                                        <div class="earning-details-child">
                                            <p>Basic Salary</p>
                                            <p class="amount"><?php echo $result['basic_salary']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Canteen Fees</p>
                                            <p class="amount"><?php echo $result['canteen_fees']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Other Allowance</p>
                                            <p class="amount"><?php echo $result['other_deductions']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Total Earnings</p>
                                            <p class="amount">P5500</p>
                                        </div>
                                    </div>
                                    <div class="deduction-details">
                                        <h3>Deductions</h3>
                                        <div class="earning-details-child">
                                            <p>Pag-ibig</p>
                                            <p class="amount"><?php echo $pag_ibig; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Philhealth</p>
                                            <p class="amount"><?php echo $philhealth; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>SSS</p>
                                            <p class="amount"><?php echo $sss; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Total Earnings</p>
                                            <p class="amount">P5500</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="table-responsive">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        // For initializing data table jQuery 
         $(document).ready(function () {
            $('#project').DataTable({
                "pageLength" : 10,
                scrollX: true,
                columnDefs: [
                    { "width": "200px", targets: "_all" },
                    { "className": "schedule-table", targets: "_all" } 
                ]
            });
        });
    </script>

</body>
</html>
