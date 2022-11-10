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
    
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
<?php
        include 'sidebar.php';
        include '../dbh.inc.php';
        // $sql = "SELECT * FROM tb_employee";
        $sql = "SELECT tbs.salary_id, tbs.emp_id, tbe.emp_type, tbe.emp_surname, tbe.emp_firstname  
        FROM tb_salary_report AS tbs LEFT JOIN tb_employee AS tbe ON  tbs.emp_id = tbe.emp_id";
        $query = mysqli_query($conn, $sql);
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
                        <h4 class="page-title">Employee Salary - Majetsco</h4>
                        <p>Employee Salary</p>
            
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
                        <div style="display:flex">
                            
                            <h3 class="box-title">Pay Slip </h3>
                            <button class="btn-add-driver btn open-form" style="margin-left: auto;bottom: 50px;">Add Schedule</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="project">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Employee</th>
                                            <th class="border-top-0">Employee Role</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Salary</th>
                                            <th class="border-top-0">Pay Slip</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($result = mysqli_fetch_array($query)){
                                                $salaryID = $result['salary_id'];
                                        ?>
                                        <tr>
                                            <td class="border-top-0"><div style=""><img src="../employee/employee_profiles/<?php echo $result['emp_id'] . "/" . $result['emp_id'] . '.png' ?>" 
                                            class="schedule-emp-img" alt="image"><p><?php echo $result['emp_firstname'] . " " .$result['emp_surname']?></p><p><?php echo $result['emp_id'] ?></p></div></td>
                                            <td class="border-top-0"><?php echo $result['emp_type']?></td>
                                            <td class="border-top-0">example@gmail.com</td>
                                            <td class="border-top-0">1000 <p style="color: gray; font-size: 10px;">Salary ID: <?php echo$salaryID?></p> </td>
                                            <td><a class = "btn btn-generate" href="salary_report.php?salary-id=<?php echo $result['salary_id'] ?>">Generate Slip </a></td>
<!-- echo $result['salary_id'] -->
                                        </tr>
                                        <?php } ?>
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