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
        content="">
    <meta name="robots" content="noindex,nofollow">
    <title>Ez Jeepney - Employees</title>
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
                        <a class="red-hover" href="a_profile?employee=<?php echo $result['emp_id'] ?>"><img src="../employee/employee_images/<?php echo $result['emp_id'] . '.png';  ?>" alt="image">
                        <h4 class="emp-profile-names"><strong><?php echo $result['emp_surname'] . ', ' . $result['emp_firstname'];
                        ?></strong></h4>
                        <p><strong><?php if(substr($result['emp_id'], 0, 2 ) == "DR"){echo "Driver<br>";}else{echo "Public Assistance Officer<br>";}
                        echo  '(' . $result['emp_id'] ?>)</a>
                        </strong></p>
                    </div>
                    <?php } ?>
                </div>
                <!-- FORM POP-UP -->
                <div class="form-popup" >
                    <div class="container form-wrapper" style="border-radius: 10px;">
                        <button class="btn close-form">Close</button>
                        <form action="inc.insert_employee.php" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="form-title" >Add new Employee</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="emp-image">Upload Employee Image</label>
                                    <input type="file" class="form-control" id="emp-image" name="emp-image" accept="image/png" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="emp-firstname">First Name</label>
                                    <input type="text" class="form-control" id="name" name="emp-firstname" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="emp-surname">Surname</label>
                                    <input type="text" class="form-control" id="emp-surname" name="emp-surname" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="name">Employee Type</label>
                                    <select class="form-control" name="emp-type" id="emp-type" style="width: 100%;font-size:14px;border-color: gray;" required>
                                        <option value="DRIVER">Driver</option>
                                        <option value="PAO">Public Assistance Officer</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="name">Date of Birth</label>
                                    <input type="text" class="form-control" id="birthdate" name="birthdate" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">Contact Number</label>
                                    <input type="text" class="form-control" id="contact-number" name="contact-number" required="">
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
                            <input type="submit" class="btn send-form" name="submit" value="Add Employee">
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
                yearRange: '-70:+0',
                dateFormat: 'yy-dd-mm'
            });
            // $('input[name="date-fixed"]').datepicker({
            //     dateFormat: 'yy-dd-mm'
            // });

        });

        $(document).ready(function() {
                $('.open-form').click(function() 
                {
                    $('.form-popup').hide(100).fadeIn(300); // SHOWS POPUP FORM
                }),
                $('.close-form').click(function()
                {
                    $('.form-popup').show(100).fadeOut(300);  //HIDES POPUP
                });
        });
    </script>
    
</body>

</html>