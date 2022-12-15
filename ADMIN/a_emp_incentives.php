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
    <title>Ez Jeepney - Employee Recognition</title>
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
                        <h3 class="page-title">Employee Recognition</h3>
                    </div>
                    <button class="btn-add-supply btn open-form">Add Incentives</button>
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
                            <h3 class="box-title">Employee of the Month</h3> <br>

                            <div class="table-responsive">
                                <table class="table text-nowrap schedule-table" >
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 required">Name of Incentive/s:</th>
                                            <th class="border-top-0 required">Amount:</th>
                                            <th class="border-top-0 required">Name of Beneficiary:</th>
                                            <th class="border-top-0 required">Date Received:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- GET VEHICLES LIST DATA FROM DB -->
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $statement = "SELECT * FROM tb_incentives";
                                            $dt = mysqli_query($conn, $statement);
                                            while ($result = mysqli_fetch_array($dt)){
                                                $result = "<tr><td>"  . $result['incentive_name'] . "</td>" .
                                                "<td>"  . $result['amt'] . "</td>" .
                                                "<td>"  . $result['beneficiary_name'] . "</td>" .
                                                "<td>"  . $result = date("F d, Y", strtotime($result['date_received'])) . "</td>";
                                                echo $result;
                                            }
                                        ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Best Attendance</h3> <br>

                        <div class="table-responsive">
                            <table class="table text-nowrap schedule-table" >
                                <thead>
                                    <tr>
                                        <th class="border-top-0 required">Name of Incentive/s:</th>
                                        <th class="border-top-0 required">Amount:</th>
                                        <th class="border-top-0 required">Name of Beneficiary:</th>
                                        <th class="border-top-0 required">Date Received:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- GET VEHICLES LIST DATA FROM DB -->
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT * FROM tb_incentives";
                                        $dt = mysqli_query($conn, $statement);
                                        while ($result = mysqli_fetch_array($dt)){
                                            $result = "<tr><td>"  . $result['incentive_name'] . "</td>" .
                                            "<td>"  . $result['amt'] . "</td>" .
                                            "<td>"  . $result['beneficiary_name'] . "</td>" .
                                            "<td>"  . $result = date("F d, Y", strtotime($result['date_received'])) . "</td>";
                                            echo $result;
                                        }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Employee with the Most Revenue Gathered</h3> <br>

                        <div class="table-responsive">
                            <table class="table text-nowrap schedule-table" >
                                <thead>
                                    <tr>
                                        <th class="border-top-0 required">Name of Incentive/s:</th>
                                        <th class="border-top-0 required">Amount:</th>
                                        <th class="border-top-0 required">Name of Beneficiary:</th>
                                        <th class="border-top-0 required">Date Received:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- GET VEHICLES LIST DATA FROM DB -->
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT * FROM tb_incentives";
                                        $dt = mysqli_query($conn, $statement);
                                        while ($result = mysqli_fetch_array($dt)){
                                            $result = "<tr><td>"  . $result['incentive_name'] . "</td>" .
                                            "<td>"  . $result['amt'] . "</td>" .
                                            "<td>"  . $result['beneficiary_name'] . "</td>" .
                                            "<td>"  . $result = date("F d, Y", strtotime($result['date_received'])) . "</td>";
                                            echo $result;
                                        }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
            
            <!-- ADD NEW PARTS OR SUPPLIES -->
            <div class="form-popup" id="add-supplies">
                <div class="container form-wrapper">
                    <button class="btn close-form">Close</button>
                    <form action="a_emp_incentives_inc.php" method="POST" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="form-title">Add Incentive/s</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name">Name of Incentive:</label>
                                <input type="text" class="form-control" id="item" name="inc_name" require>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="name">Amount:</label>
                                <input type="text" class="form-control" id="qty" name="amt" require>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="name">Name of Beneficiary:</label>
                                <input type="text" class="form-control" id="item" name="benef_name" require>
                            </div>
                            <div class="col-sm-12">Date Received<br>
                                <div class="col-sm-12 border-bottom">
                                    <input type="date" name="date_rec" id="date_rec" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()'? require>
                                        <noscript>
                                            <input type="submit" value="submit">
                                        </noscript>
                                </div>
                        </div>
                        <div class="form-check">
                            <label></label>
                        </div>
                        <input type="submit" name="submit" class="btn send-form" value="Confirm">
                    </form>
                </div>
            </div>
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
    <script>

</script>
    <script>

        // FUNCTION FOR OPEN-FORM //
        $(document).ready(function() {
            $('.open-form').click(function() {
                $('.form-popup').show();
            });
            $('.close-form').click(function() {
                $('.form-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var container = $(".form-wrapper");
                var form = $(".form-popup");

                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    form.hide();
                }
            });
        });

        $(document).ready(function() {
            $('.edit-form').click(function() {
                $('.eform-popup').show();
            });
            $('.eclose-form').click(function() {
                $('.eform-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var econtainer = $(".eform-wrapper");
                var eform = $(".eform-popup");

                if (!econtainer.is(e.target) && econtainer.has(e.target).length === 0) {
                    eform.hide();
                }
            });
        });
    </script>

</body>

</html>