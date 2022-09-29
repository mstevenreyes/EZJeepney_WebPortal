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
    <title>Driver Profile - Majetsco</title>
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
    <!-- Steven Custom CSS -->
    <link rel="stylesheet" href="css/steven_style.css">
</head>

<body>
    <?php
            include 'sidebar.php';
            include '../dbh.inc.php';
            $sql = "SELECT * FROM tb_employee";
            $stmt = mysqli_query($conn, $sql);
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
                        <h3 class="page-title">Employee List</h3>
                    </div>
                    <button class="btn-add-driver btn open-form">Add New Employee</button>
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
                <!-- Row -->
                <div class="emp-row">
                    <?php while($result = mysqli_fetch_array($stmt)){ ?>
                    <div class="emp-container">
                        <a href="a_profile.php?employee=<?php echo $result['emp_id'] ?>"><img src="../employee/employee_profiles/<?php echo $result['emp_id']. '/'. $result['emp_id'] . '.png';  ?>" alt="image">
                        <h4 class="emp-profile-names"><strong><?php echo $result['emp_surname'] . ', ' . $result['emp_firstname'];
                        ?></strong></h4></a>
                        <p><strong><?php if(substr($result['emp_id'], 0, 2 ) == "DR"){echo "Driver<br>";}else{echo "Public Assistance Officer<br>";}
                        echo  '(' . $result['emp_id'] ?>)
                        </strong></p>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Johnathan Doe"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" placeholder="johnathan@admin.com"
                                                class="form-control p-0 border-0" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" value="password" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone No</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="123 456 7890"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-12">
                    <div class="card">
                            <div class="white-box">              
                            </div>
                    </div>
                </div>
                <!-- FORM POP-UP -->
                <div class="form-popup">
                    <div class="container form-wrapper">
                        <button class="btn close-form">Close</button>
                        <form action="inc.insert_employee.php" id="my-form" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="form-title">Add new Employee</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="name">Employee Type</label>
                                    <select name="emp-type" id="emp-type" required></select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="name">Date of Birth</label>
                                    <input type="text" class="form-control" id="birthdate" name="birthdate" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">Contact Number</label>
                                    <input type="text" class="form-control" id="email" name="email" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="something">Address</label>
                                    <textarea name="something" class="form-control" id=""></textarea>
                                </div>
                            </div>
                            <div class="form-check">
                                <label>
                                </label>
                            </div>
                            <button type="submit" class="btn send-form">Add Employee</button>
                        </form>
                    </div>
                </div>
            
            </div>
           
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> ©2022 EZ JEEPNEY </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
      
</script>
    <script>

        // DATEPICKER
          $(function() {
            $('input[name="birthdate"]').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-dd-mm'
            });
            // $('input[name="date-fixed"]').datepicker({
            //     dateFormat: 'yy-dd-mm'
            // });

        });

        $(document).ready(function() {
        // FUNCTION FOR FORM
        $('.open-form').click(function() {
            $('.form-popup').show();
        });
        $('.close-form').click(function() {
            $('.form-popup').hide();
   
        });

        $(document).mouseup(function(e) {
            var container = $(".form-wrapper");
            var form = $(".form-popup");

            // if (!container.is(e.target) && container.has(e.target).length === 0) {
            //     form.hide();
            // }
        });


        });
    </script>
</body>

</html>