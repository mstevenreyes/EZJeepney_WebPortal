<?php
    include '../dbh.inc.php';
    $sql = "SELECT * FROM tb_employee WHERE emp_id='" . $_GET['employee'] . "'";
    $stmt = mysqli_query($conn, $sql);

    if(!$result = mysqli_fetch_assoc($stmt)){
        header("location: a_emp_list.php?error=employee-not-found");
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>EZ Jeepney - Employee Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="../images/favicon.ico">
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 employee-profile-label">
                        <h3 class="page-title">Employee Profile</h3>
                    </div> 
                    <div class="edit-profile-container">
                        <button class="btn edit-profile-btn open-form">Edit Profile</button>
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
                        <div class="white-box" style="display:flex;">
                            <div class="profile-container">
                                <img class="profile-img" src="../employee/employee_images/<?php echo $result['emp_id'] . '.png';  ?>" alt="image">
                            </div>   
                            <div class="profile-container" style="margin: 50px 0px 0px 30px;flex:2;">
                                <h3><?php echo $result['emp_surname'] . ', ' . $result['emp_firstname']; ?></h3>
                                <h5><?php echo $result['emp_id'];?></h5>
                                <h5><?php echo $empType = substr($result['emp_id'], 0, 2) == "DR" ?  "Jeepney Driver" : "Public Assistance Officer"; ?></h3>
                                <h5><?php echo $result['emp_status']; ?> Employee</h5>
                                <h5>Date Hired: <?php echo date("F d, Y", strtotime($result['date_hired'])); ?></h5>
                            </div>
                            <div class="profile-container" style="margin-top: 50px; flex:2;">
                                <h5>Phone: <?php echo $result['emp_phone_number'] ?> </h5>
                                <h5>Birthday: <?php echo date('F d, Y', strtotime($result['emp_birthday'])); ?></h5>
                                <h5>Address: <?php echo $result['emp_address']; ?></h5>
                                <h5>Gender: <?php echo $result['emp_gender']; ?></h5>
                                <br>
                                <h5><?php 
                                        $empId = $result['emp_id'];
                                        $sql = "SELECT * FROM tb_fixed_schedule WHERE emp_id = '$empId'";
                                        $query = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($query);
                                        echo "Work Days: " . $row['work_days']; 
                                    ?>
                                </h5>
                                <h5>Work Hours: <?php echo date('h:i A', strtotime($row['shift_start'])) . " - " . date('h:i A', strtotime($row['shift_end'])); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box" style="display:flex;">
                            <div class="profile-container">
                                <h4><strong>Emergency Contact</strong></h4>
                                <p><strong>Primary</strong></p>
                                <p>Name:  <?php echo $result['emp_primary_name']; ?></p>
                                <p>Relationship:  <?php echo $result['emp_primary_relationship']; ?></p>
                                <p>Phone:  <?php echo $result['emp_primary_phone']; ?></p>
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